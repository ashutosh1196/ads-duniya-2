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
            <a class="btn btn-sm btn-success float-right" href="{{ route('add_company_credit') }}">{{ __('adminlte::adminlte.add_company_credit') }}</a>
            <table id="companyCreditsList" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.recruiter') }}</th>
                  <th>{{ __('adminlte::adminlte.credits_available') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < count($companyCreditsList); $i++)
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>
                    <?php
                      $company = \App\Models\Organization::where('id', $companyCreditsList[$i]->organization_id)->get();
                      $creditDetails = \App\Models\OrganizationCreditDetail::where('organization_credit_id', $companyCreditsList[$i]->id)->get();
                      $recruiter = \App\Models\Recruiter::find($creditDetails[0]->recruiter_id);
                    ?>
                    {{ $company[0]->name }}
                  </td>
                  <td>
                    @if($recruiter != null)
                      <a href="{{ route('view_recruiter', [ 'id' => $recruiter->id ]) }}">{{ $recruiter->first_name ? $recruiter->first_name.' '.$recruiter->last_name : $recruiter->email }}</a>
                    @endif
                  </td>
                  <td>${{ $companyCreditsList[$i]->total_credits }}</td>
                  <td>
                    <a class="action-button" title="View" href="{{ route( 'view_company_credit', [ 'id' => $companyCreditsList[$i]->id ] ) }}"><i class="text-info fa fa-eye"></i></a>
                  </td>
                </tr>
                @endfor
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.company_name') }}</th>
                  <th>{{ __('adminlte::adminlte.recruiter') }}</th>
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
