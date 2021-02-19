@extends('adminlte::page')

@section('title', 'Company Credits')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.company_credits') }}</h1>
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
            <table id="companyCreditsList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.credits_available') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < count($companyCreditsList); $i++)
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>RV Technologies</td>
                  <td>$0.00</td>
                  <td>
                    <a class="action-button" title="View" href="{{ route( 'view_company_credit', [ 'id' => 1 ] ) }}"><i class="text-info fa fa-eye"></i></a>
                    <a class="action-button" title="Add Credits" href="{{ route( 'add_company_credit', [ 'id' => 1 ] ) }}"><i class="text-success fa fa-hand-holding-usd"></i></a>
                    <!-- <a class="action-button" title="Edit" href="edit/1"><i class="text-warning fa fa-edit"></i></a> -->
                    <!-- <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="1"><i class="text-danger fa fa-trash-alt"></i></a> -->
                  </td>
                </tr>
                @endfor
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.credits_available') }}</th>
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
      $('#companyCreditsList').DataTable( {
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
