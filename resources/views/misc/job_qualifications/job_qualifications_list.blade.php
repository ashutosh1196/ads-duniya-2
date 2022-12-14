@extends('adminlte::page')

@section('title', 'Job Qualifications')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Job Qualifications</h3>
            <a class="btn btn-sm btn-success" href="{{ route('add_job_qualification') }}">Add New Job Qualification</a>
          </div>            
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <table style="width:100%" id="jobQualifications" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th class="display-none"></th>
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.job_industry') }}</th>
                  <th>{{ __('adminlte::adminlte.status') }}</th>
                  @can('manage_job_qualification_actions')
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                  @endcan
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($jobQualifications); $i++) { 
                  $organisation = \App\Models\Organization::where('id', $jobQualifications[$i]->organization_id)->get();
                  $jobTypeTrimmed = str_replace('_', ' ', $jobQualifications[$i]->job_type);
                  $jobType = ucwords($jobTypeTrimmed);
                ?>
                <tr>
                  <th class="display-none"></th>
                  <td>{{ $jobQualifications[$i]->name }}</td>
                  <td>{{ App\Models\JobIndustry::find($jobQualifications[$i]->job_industry_id)->name }}</td>
                  <td>{{ $jobQualifications[$i]->status ? 'Active' : 'Inactive' }}</td>
                  @can('manage_job_qualification_actions')
                    <td>
                      @can('view_job_qualification')
                        <a class="action-button" title="View" href="view/{{$jobQualifications[$i]->id}}"><i class="text-info fa fa-eye"></i></a>
                      @endcan
                      @can('edit_job_qualification')
                        <a class="action-button" title="Edit" href="edit/{{$jobQualifications[$i]->id}}"><i class="text-warning fa fa-edit"></i></a>
                      @endcan
                      @can('delete_job_qualification')
                        <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $jobQualifications[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                      @endcan
                    </td>
                  @endcan
                </tr>
                <?php } ?>
              </tbody>
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
      $('#jobQualifications').DataTable( {
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
              url: "{{ route('delete_job_qualification') }}",
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
                }
                else {
                  console.log("FALSE");
                  setTimeout(() => {
                  alert("Something went wrong! Please try again.");
                  }, 500);
                }
              }
            });
          } 
        });
      });
    });
  </script>
@stop
