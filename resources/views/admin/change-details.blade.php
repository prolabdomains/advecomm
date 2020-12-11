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
          <h3 class="card-title">Update Details</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.change.details') }}" enctype="multipart/form-data" id="updateAdminDetailsFrm">
            @csrf
          <div class="card-body">

            <div class="form-group">
                <label for="">Admin Name</label>
                  <input type="text" name="admin_name" value="{{Auth::guard('admin')->user()->name}}" class="form-control" id="admin_name">
            </div>

            <div class="form-group">
              <label for="">Email Address</label>
                <input type="text" name="admin_email" value="{{Auth::guard('admin')->user()->email}}" class="form-control" id="admin_email">
            </div>

            <div class="form-group">
                <label for="">Admin Type</label>
                  <input type="text" name="admin_type" value="{{Auth::guard('admin')->user()->type}}" class="form-control" id="admin_type">
            </div>

            <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="admin_mobile" value="{{Auth::guard('admin')->user()->mobile}}" class="form-control" id="admin_mobile">
            </div>

            <div class="form-group">
                <label for="">Profile Image</label>
                <input type="file" name="admin_image"class="form-control" id="admin_image">
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

@endsection
