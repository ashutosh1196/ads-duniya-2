@extends('adminlte::page')

@section('title', 'Bookmarked Jobs')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.bookmarked_jobs') }}</h1>
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
            <table id="bookmarked-jobs" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.title') }}</th>
                  <th>{{ __('adminlte::adminlte.description') }}</th>
                  <th>{{ __('adminlte::adminlte.experience_required') }}</th>
                  <th>{{ __('adminlte::adminlte.salary') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($bookmarkedJobs); $i++) { ?>
                <tr>
                  <td>1</td>
                  <td>RV Technologies</td>
                  <td>Software Developer</td>
                  <td>Urgent Requirement for Software Developer</td>
                  <td>3 Years</td>
                  <td>NA</td>
                  <td><a href="#">View | Edit | Delete</a></td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.title') }}</th>
                  <th>{{ __('adminlte::adminlte.description') }}</th>
                  <th>{{ __('adminlte::adminlte.experience_required') }}</th>
                  <th>{{ __('adminlte::adminlte.salary') }}</th>
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
@stop

@section('js')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $('#bookmarked-jobs').DataTable( {
      columnDefs: [ {
        targets: 0,
        render: function ( data, type, row ) {
          return data.substr( 0, 2 );
        }
      }]
    });
  </script>
@stop
