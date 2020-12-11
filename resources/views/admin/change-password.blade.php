@extends('admin.layouts.master')

@section('page_title')
Settings
@endsection

@section('breadcrumb')
Admin Settings
@endsection

@section('content')

<div class="col-md-6 offset-2">

    @if(Session::has('flash_message'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              {{ Session::get('flash_message') }}
            </div>
    @endif

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update Password</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.change.password') }}" id="updateAdminPasswordFrm">
            @csrf
          <div class="card-body">

            <!-- <div class="form-group">
                <label for="">Admin Name</label>
                  <input type="text" value="{{$adminData->name}}" class="form-control" id="admin_name">
            </div> -->

            <div class="form-group">
              <label for="">Email Address</label>
                <input readonly value="{{$adminData->email}}" class="form-control" id="admin_email">
            </div>

            <div class="form-group">
                <label for="">Admin Type</label>
                  <input readonly value="{{$adminData->type}}" class="form-control" id="admin_type">
              </div>

            <div class="form-group">
              <label for="">Current Password</label>
              <input type="password" name="chkCurrentPassword" class="form-control {{ $errors->has('chkCurrentPassword') ? 'is-invalid' : '' }}" id="admin_current_password" placeholder="Enter Current Password"
              >
                <span id="current_password_feedback"></span>
                @if($errors->has('chkCurrentPassword'))
                <span class="error invalid-feedback">{{ $errors->first('chkCurrentPassword') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="">New Password</label>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="admin_new_password" placeholder="Enter New Password">
                <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
            </div>

            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="admin_confirm_password" placeholder="Confirm Password">
                <span class="error invalid-feedback">{{$errors->first('password_confirmation')}}</span>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>

@endsection

@section('extra_script')
<script>
    jQuery(document).ready(function($){
        $('#admin_current_password').on('keyup',function(e){
            var currentPassword = $(this).val();
            $.ajax({
                method: 'POST',
                url: '/admin/chkCurrentPassword',
                data: {'chkCurrentPassword': currentPassword},
                success: function(resp){
                    if(resp === true){ $('#current_password_feedback').html("<font color='blue'>your current password is valid</font>") }
                    if(resp === false){ $('#current_password_feedback').html("<font color='red'>your current password is invalid</font>") }
                    console.log(resp);
                },
                error: function(){}
            });
        });
    });
</script>
@endsection
