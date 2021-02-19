@extends('adminlte::page')

@section('title', 'Payment History')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.payment_history') }}</h1>
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
            <table id="companyPaymentsList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.credits_available') }}</th>
                  <th>{{ __('adminlte::adminlte.transaction_type') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < count($companyPaymentsList); $i++)
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>
                    <?php $company = \App\Models\Organization::where('id', $companyPaymentsList[$i]->organization_id)->get(); ?>
                    {{ $company[0]->name }}
                  </td>
                  <td>${{ $companyPaymentsList[$i]->credits }}</td>
                  <td class="{{ $companyPaymentsList[$i]->txn_type == 'debit' ? 'text-danger' : 'text-success'}}">{{ ucfirst($companyPaymentsList[$i]->txn_type) }}</td>
                  <td>
                    <a class="action-button" title="View" href="{{ route( 'view_company_payment', [ 'id' => $companyPaymentsList[$i]->id ] ) }}"><i class="text-info fa fa-eye"></i></a>
                  </td>
                </tr>
                @endfor
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.credits_available') }}</th>
                  <th>{{ __('adminlte::adminlte.transaction_type') }}</th>
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
      $('#companyPaymentsList').DataTable( {
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
