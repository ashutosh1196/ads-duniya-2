@extends('adminlte::page')

@section('title', 'Payments Transactions')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.payments_transactions') }}</h1>
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
            <table style="width:100%" id="paymentTransactionsList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="display:none">#</th>
                  <th>{{ __('adminlte::adminlte.transaction_id') }}</th>
                  <th>{{ __('adminlte::adminlte.amount') }}</th>
                  <th>{{ __('adminlte::adminlte.status') }}</th>
                  <th>{{ __('adminlte::adminlte.description') }}</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < count($paymentTransactionsList); $i++)
                <tr>
                  <td style="display:none">{{ $i+1 }}</td>
                  <td>{{ $paymentTransactionsList[$i]->txn_id }}</td>
                  <td>£{{ $paymentTransactionsList[$i]->amount }}</td>
                  <td class="{{ $paymentTransactionsList[$i]->status == 'succeeded' ? 'text-success' : 'text-danger' }}">{{ ucfirst($paymentTransactionsList[$i]->status) }}</td>
                  <td >{{ $paymentTransactionsList[$i]->description }}</td>
                  <td>
                    <?php
                      $company = \App\Models\Organization::find($paymentTransactionsList[$i]->organization_id);
                    ?>
                    {{ $company != null ? $company->name : '' }}
                  </td>
                  <td>
                    <a class="action-button" title="View" href="{{ route( 'view_payment_transaction', [ 'id' => $paymentTransactionsList[$i]->id ] ) }}"><i class="text-info fa fa-eye"></i></a>
                  </td>
                </tr>
                @endfor
              </tbody>
              <tfoot>
                <tr>
                  <th style="display:none">#</th>
                  <th>{{ __('adminlte::adminlte.transaction_id') }}</th>
                  <th>{{ __('adminlte::adminlte.amount') }}</th>
                  <th>{{ __('adminlte::adminlte.status') }}</th>
                  <th>{{ __('adminlte::adminlte.description') }}</th>
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
      $('#paymentTransactionsList').DataTable( {
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
