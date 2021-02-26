@extends('adminlte::page')

@section('title', 'Jobs History')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.jobs_history') }}</h1>
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
            <table id="JobHistory" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.job_title') }}</th>
                  <th>{{ __('adminlte::adminlte.reference_number') }}</th>
                  <th>{{ __('adminlte::adminlte.job_type') }}</th>
                  <th>{{ __('adminlte::adminlte.industry') }}</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($JobHistory); $i++) { 
                  $organisation = \App\Models\Organization::where('id', $JobHistory[$i]->organization_id)->get();
                  $jobTypeTrimmed = str_replace('_', ' ', $JobHistory[$i]->job_type);
                  $jobType = ucwords($jobTypeTrimmed);
                ?>
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>{{ $JobHistory[$i]->job_title }}</td>
                  <td>{{ $JobHistory[$i]->job_ref_number }}</td>
                  <td>{{ $jobType }}</td>
                  <td>{{ $JobHistory[$i]->industry }}</td>
                  <td>{{ count($organisation) > 0 ? $organisation[0]->name : '--' }}</td>
                  <td>
                    <a class="action-button" title="View" href="view_job_history/{{ $JobHistory[$i]->job_id}} "><i class="text-info fa fa-eye"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.job_title') }}</th>
                  <th>{{ __('adminlte::adminlte.reference_number') }}</th>
                  <th>{{ __('adminlte::adminlte.job_type') }}</th>
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
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#JobHistory').DataTable( {
        columnDefs: [ {
          targets: 0,
          render: function ( data, type, row ) {
            return data.substr( 0, 2 );
          }
        }]
      });
    });
  </script>
@stop
