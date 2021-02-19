@extends('adminlte::page')

@section('title', 'Payments History')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.payments_history') }}</h1>
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
            <table id="paymentsHistory" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < count($paymentsHistory); $i++)
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>
                    <?php $company = \App\Models\Organization::where('id', $paymentsHistory[$i]->organization_id)->get(); ?>
                    {{ $company[0]->name }}
                  </td>
                  <td>
                    <a class="action-button" title="View" href="{{ route( 'view_payment_history', [ 'id' => $paymentsHistory[$i]->id ] ) }}"><i class="text-info fa fa-eye"></i></a>
                  </td>
                </tr>
                @endfor
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
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
@stop

@section('js')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#paymentsHistory').DataTable( {
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
