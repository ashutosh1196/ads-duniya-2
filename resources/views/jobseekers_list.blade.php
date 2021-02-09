@extends('adminlte::page')

@section('title', 'Job Seekers')

@section('content_header')
  <h1>Job Seekers</h1>
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{ route('add_jobseeker') }}">Add Jobseeker</a>
          <table id="jobseekers-list" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Job Alerts</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($jobseekersList); $i++) { ?>
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $jobseekersList[$i]->name }}</td>
                <td>{{ $jobseekersList[$i]->email }}</td>
                <td>{{ $jobseekersList[$i]->phone_number ? $jobseekersList[$i]->phone_number : '--' }}</td>
                <td class="{{ $jobseekersList[$i]->is_job_alert_enabled ? 'text-success' : 'text-danger' }}">{{ $jobseekersList[$i]->is_job_alert_enabled ? 'Enabled' : 'Disabled' }}</td>
                <td>Active</td>
                <td width="100"  style="text-align:center;">
                  <a class="action-button" title="View" href="view/{{$jobseekersList[$i]->id}}"><i class="text-info fa fa-eye"></i></a>
                  <a style="margin-left:5px;" class="action-button" title="Edit" href="edit/{{$jobseekersList[$i]->id}}"><i class="text-warning fa fa-edit"></i></a>
                  <a style="margin-left:5px;" class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $jobseekersList[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Job Alerts</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <style>
    /* .action-button {
      margin-left: 5px;
    } */
  </style>
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#jobseekers-list').DataTable( {
        columnDefs: [ {
          targets: 0,
          render: function ( data, type, row ) {
            return data.substr( 0, 2 );
          }
        }]
      });
      $('.delete-button').click(function(e) {
        var id = $(this).attr('data-id');
        var obj = $(this);
        // console.log({id});
        swal({
          title: "Are you sure?",
          text: "Do you want to delete the Jobseeker?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('delete_jobseeker') }}",
              type: 'post',
              data: {
                id: id
              },
              dataType: "JSON",
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response) {
                console.log("Response", response);
                if(response.success == 1) {
                console.log("TRUE");
                  obj.parent().parent().remove();
                }
                else {
                  console.log("FALSE");
                  setTimeout(() => {
                  alert("Something went wrong! Please try again.");
                  }, 500);
                  // swal("Error!", "Something went wrong! Please try again.", "error");
                  // swal("Something went wrong! Please try again.");
                }
              }
            });
          } 
        });
      });
    });
  </script>
@stop
