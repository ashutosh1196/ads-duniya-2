@extends('adminlte::page')

@section('title', 'Job Industries')

@section('content_header')
  <h1>Job Industries</h1>
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
            <a class="btn btn-sm btn-success float-right" href="{{ route('add_job_industry') }}">{{ __('adminlte::adminlte.add_new_job_industry') }}</a>
            <table id="jobIndustriesList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <!-- <th>#</th> -->
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.slug') }}</th>
                  <th>{{ __('adminlte::adminlte.status') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($jobIndustriesList); $i++) { 
                  $organisation = \App\Models\Organization::where('id', $jobIndustriesList[$i]->organization_id)->get();
                  $jobTypeTrimmed = str_replace('_', ' ', $jobIndustriesList[$i]->job_type);
                  $jobType = ucwords($jobTypeTrimmed);
                ?>
                <tr>
                  <!-- <td>{{ $i+1 }}</td> -->
                  <td>{{ $jobIndustriesList[$i]->name }}</td>
                  <td>{{ $jobIndustriesList[$i]->slug }}</td>
                  <td>{{ $jobIndustriesList[$i]->status ? 'Active' : 'Inactive' }}</td>
                  <td>
                    <a class="action-button" title="View" href="view/{{$jobIndustriesList[$i]->id}}"><i class="text-info fa fa-eye"></i></a>
                    <a class="action-button" title="Edit" href="edit/{{$jobIndustriesList[$i]->id}}"><i class="text-warning fa fa-edit"></i></a>
                    <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $jobIndustriesList[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <!-- <th>#</th> -->
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.slug') }}</th>
                  <th>{{ __('adminlte::adminlte.status') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
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
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#jobIndustriesList').DataTable( {
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
        swal({
          title: "Are you sure?",
          text: "Are you sure you want to move this Job Industry to the Recycle Bin?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('delete_job_industry') }}",
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
                  window.location.reload();
                  /* console.log("response", response);
                  obj.parent().parent().remove(); */
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
