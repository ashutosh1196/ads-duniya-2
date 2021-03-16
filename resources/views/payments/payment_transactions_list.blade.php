@extends('adminlte::page')

@section('title', 'Payments Transactions')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>{{ __('adminlte::adminlte.payments_transactions') }}</h3>
            <a class="btn btn-sm btn-success invisible" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>           
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <div class="text-right mb-3">
              <a href="" class="show-advance-options">Advance Options <i class="fa fa-caret-down"></i></a>
              <div class="advance-options" style="display: none;">

                <input type="text" name="date_range" class="form-control">
                <div class="advance_options_btn">
                  <button class="btn btn-primary export-as-csv">Export as CSV</button>
                  <button  class="btn btn-primary export-bulk-invoices">Download bulk invoices</button>   
                  <button  class="btn btn-primary apply-filter">Apply</button>   
                                     
                </div>

              </div>
            </div>
            <table style="width:100%" id="paymentTransactionsList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  {{-- <th style="display:none">#</th> --}}
                  <th>{{ __('adminlte::adminlte.transaction_id') }}</th>
                  <th>{{ __('adminlte::adminlte.amount') }}</th>
                  <th>{{ __('adminlte::adminlte.status') }}</th>
                  <th>{{ __('adminlte::adminlte.description') }}</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                {{-- @for ($i=0; $i < count($paymentTransactionsList); $i++)
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
                @endfor --}}
              </tbody>
             {{--  <tfoot>
                <tr>
                  <th style="display:none">#</th>
                  <th>{{ __('adminlte::adminlte.transaction_id') }}</th>
                  <th>{{ __('adminlte::adminlte.amount') }}</th>
                  <th>{{ __('adminlte::adminlte.status') }}</th>
                  <th>{{ __('adminlte::adminlte.description') }}</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </tfoot> --}}
            </table>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@stop

@section('js')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script>
    var table;
    function build_datatable(date_range='') {
        $('#paymentTransactionsList').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [],
            ajax: {
              url:"{{ route('datatable.payment.logs') }}",
              type: 'GET',
              data: {
                date_range:date_range
              }  
              
            },
            columns: [
                // {data: 'id', name: 'id'},
                {data: 'txn_id', name: 'txn_id'},
                {data: 'amount', name: 'amount'},
                {data: 'status', name: 'status'},
                {data: 'description', name: 'description'},
                {data: 'company_name', name: 'company_name'},
                {data: 'invoice', name: 'invoice'},
                
            ],
            // dom: 'lfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            language: {
            "processing": "<div class='datatable-loader-processing'><div class='loader-img'></div></div>"
            },
        });
    }
    build_datatable();
    $(document).ready(function() {
      // $('#paymentTransactionsList').DataTable( {
      //   columnDefs: [ {
      //     targets: 0,
      //     render: function ( data, type, row ) {
      //       return data.substr( 0, 2 );
      //     }
      //   }]
      // });

      $('input[name="date_range"]').daterangepicker({
        "startDate": "01/01/2021",
        "endDate": "12/31/2021"
      });
      $('body').on('click','.show-advance-options',function(e){
        e.preventDefault();
        $('.advance-options').slideToggle();
      });

      
    });

     $('body').on('click','.apply-filter',function(){
        $('#paymentTransactionsList').DataTable().destroy();
        build_datatable($('input[name="date_range"]').val());
      });


     $('body').on('click','.export-as-csv',function(){

        var date_range = $('input[name="date_range"]').val();

        $.ajax({
            url: '{{ route('datatable.export.payment.logs') }}',
            method: 'post',
            data: {
                date_range: date_range
            },
            xhrFields: {
                responseType: 'blob'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
                // return false;
                var a = document.createElement('a');
                var url = window.URL.createObjectURL(data);
                a.href = url;
                a.download = 'payment_logs.xlsx';
                document.body.append(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
            }
        });
      })
      $('body').on('click','.export-bulk-invoices',function(){

        var date_range = $('input[name="date_range"]').val();

        $.ajax({
            url: '{{ route('datatable.export.bulk.invoices') }}',
            method: 'post',
            data: {
                date_range: date_range
            },
            xhrFields: {
                responseType: 'blob'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
                // return false;
                var a = document.createElement('a');
                var url = window.URL.createObjectURL(data);
                a.href = url;
                a.download = 'invoices.pdf';
                document.body.append(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
            }
        });
      })
  </script>
@stop
