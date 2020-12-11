@extends('admin.layouts.master')

@section('breadcrumb') Sections @endsection

@section('page_title') Sections @endsection

@section('content')

<div class="row">
    <div class="col-5 offset-2">
        <div class="card card-blue">
            <div class="card-header">
              <h3 class="card-title">Section Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row"><div class="col-sm-12">
                  <table id="sections" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sections as $section)
                    <tr>
                        <td>{{$section->id}}</td>
                        <td>{{$section->name}}</td>
                        <td>
                            @if($section->status == 1)
                            <a href="#" class="btn btn-xs btn-primary section_status_btn" data-section_id="{{$section->id}}" data-section_status="{{$section->status}}">Active</a>
                            @endif

                            @if($section->status == 0)
                            <a href="#" class="btn btn-xs btn-danger section_status_btn" data-section_id="{{$section->id}}" data-section_status="{{$section->status}}">Inactive</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
             </tbody>
              </table>
            </div></div>
        </div>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>

@endsection

@section('extra_script')
<script>
    $(function () {
      $("#sections").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      });

      $('a.section_status_btn').on('click', function(evt){
          evt.preventDefault();
          var section_id = evt.currentTarget.dataset.section_id;
          var section_status = evt.currentTarget.dataset.section_status;
          $.ajax({
              method: 'POST',
              url: '/admin/update-section-status',
              data:{
                  'section_id': section_id,
                  'section_status': section_status
              },
              success: function(resp){
                  if(resp.section_status === 0){
                    $(`a[data-section_id=${section_id}]`)
                    .attr('class', 'section_status_btn btn btn-xs btn-danger')
                    .attr('data-section_id', `${resp.section_id}`)
                    .attr('data-section_status', `${resp.section_status}`)
                    .text('Inactive');
                  }

                  if(resp.section_status === 1){
                    $(`a[data-section_id=${section_id}]`)
                    .attr('class', 'section_status_btn btn btn-xs btn-primary')
                    .attr('data-section_id', `${resp.section_id}`)
                    .attr('data-section_status', `${resp.section_status}`)
                    .text('Active');
                  }
              }
          });
      });
    });
  </script>
@endsection
