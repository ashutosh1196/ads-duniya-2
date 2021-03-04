@extends('adminlte::page')

@section('title', 'Published Jobs')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.published_jobs') }}</h1>
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
            <!-- <a class="btn btn-sm btn-success float-right" href="{{ route('add_job') }}">{{ __('adminlte::adminlte.add_new_job') }}</a> -->
            <table id="jobsList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.job_title') }}</th>
                  <!-- <th>{{ __('adminlte::adminlte.reference_number') }}</th> -->
                  <th>{{ __('adminlte::adminlte.job_type') }}</th>
                  <th>{{ __('adminlte::adminlte.industry') }}</th>
                  <th>{{ __('adminlte::adminlte.company') }}</th>
                  <th>{{ __('adminlte::adminlte.recruiter') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($jobsList); $i++) { 
                  $organisation = \App\Models\Organization::find($jobsList[$i]->organization_id);
                  $recruiter = \App\Models\Recruiter::find($jobsList[$i]->recruiter_id);
                  $jobTypeTrimmed = str_replace('_', ' ', $jobsList[$i]->job_type);
                  $jobType = ucwords($jobTypeTrimmed);
                  $jobIndustry = \App\Models\JobIndustry::find($jobsList[$i]->job_industry_id);
                ?>
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>{{ $jobsList[$i]->job_title }}</td>
                  <!-- <td>{{ $jobsList[$i]->job_ref_number }}</td> -->
                  <td>{{ $jobType }}</td>
                  <td>{{ $jobIndustry->name }}</td>
                  <td>{{ $organisation ? $organisation->name : '--' }}</td>
                  <td><a href="{{ route('view_recruiter', [ 'id' => $recruiter->id ]) }}">{{ $recruiter->first_name ? $recruiter->first_name.' '.$recruiter->last_name : $recruiter->email }}<a></td>
                  <td>
                    <a class="action-button" title="View" href="view/{{$jobsList[$i]->id}}"><i class="text-info fa fa-eye"></i></a>
                    <a class="action-button" title="Edit" href="edit/{{$jobsList[$i]->id}}"><i class="text-warning fa fa-edit"></i></a>
                    <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $jobsList[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.job_title') }}</th>
                  <!-- <th>{{ __('adminlte::adminlte.reference_number') }}</th> -->
                  <th>{{ __('adminlte::adminlte.job_type') }}</th>
                  <th>{{ __('adminlte::adminlte.industry') }}</th>
                  <th>{{ __('adminlte::adminlte.company') }}</th>
                  <th>{{ __('adminlte::adminlte.recruiter') }}</th>
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
      $('#jobsList').DataTable( {
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
          text: "Are you sure you want to move this Job to the Recycle Bin?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('delete_job') }}",
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
