@extends('adminlte::page')

@section('title', 'Deleted Jobs')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.deleted_jobs') }}</h1>
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <table style="width:100%" id="deletedJobsList" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="display-none"></th>
              <th>{{ __('adminlte::adminlte.job_title') }}</th>
              <th>{{ __('adminlte::adminlte.reference_number') }}</th>
              <!-- <th>{{ __('adminlte::adminlte.job_type') }}</th> -->
              <th>{{ __('adminlte::adminlte.industry') }}</th>
              <th>{{ __('adminlte::adminlte.company_name') }}</th>
              <th>{{ __('adminlte::adminlte.actions') }}</th>
            </tr>
          </thead>
          <tbody>
            <?php for ($i=0; $i < count($deletedJobs); $i++) { 
              $organisation = \App\Models\Organization::where('id', $deletedJobs[$i]->organization_id)->get();
              $jobTypeTrimmed = str_replace('_', ' ', $deletedJobs[$i]->job_type);
              $jobType = ucwords($jobTypeTrimmed);
              $jobIndustry = \App\Models\JobIndustry::find($deletedJobs[$i]->job_industry_id);
            ?>
            <tr>
              <th class="display-none"></th>
              <td>{{ $deletedJobs[$i]->job_title }}</td>
              <td>{{ $deletedJobs[$i]->job_ref_number }}</td>
              <!-- <td>{{ $jobType }}</td> -->
              <td>{{ $jobIndustry->name }}</td>
              <td>{{ count($organisation) > 0 ? $organisation[0]->name : '' }}</td>
              <td>
                <a class="action-button restore-button" title="Restore" href="javascript:void(0)" data-id="{{ $deletedJobs[$i]->id}}"><i class="text-danger fa fa-undo"></i></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th class="display-none"></th>
              <th>{{ __('adminlte::adminlte.job_title') }}</th>
              <th>{{ __('adminlte::adminlte.reference_number') }}</th>
              <!-- <th>{{ __('adminlte::adminlte.job_type') }}</th> -->
              <th>{{ __('adminlte::adminlte.industry') }}</th>
              <th>{{ __('adminlte::adminlte.company_name') }}</th>
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
      $('#deletedJobsList').DataTable( {
        columnDefs: [ {
          targets: 0,
          render: function ( data, type, row ) {
            return data.substr( 0, 2 );
          }
        }]
      });
      $('.restore-button').click(function(e) {
        var id = $(this).attr('data-id');
        var obj = $(this);
        // console.log({id});
        swal({
          title: "Are you sure?",
          text: "Are you sure you want to restore the Jobseeker?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            console.log("id", id);
            $.ajax({
              url: "{{ route('restore_job') }}",
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
