@extends('adminlte::page')

@section('title', 'Credit Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>{{ __('adminlte::adminlte.credit_information') }}</h1>
    <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
  </div>
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

          <form class="form_wrap">

            <div class="row">
            
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.company_name') }}</label>
                  <?php $company = \App\Models\Organization::where('id', $companyCreditDetails[0]->organization_id)->get(); ?>
                  <input class="form-control" placeholder="{{ $company[0]->name }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.credits_available') }}</label>
                  <input class="form-control" placeholder="${{ $companyCreditDetails[0]->total_credits ? $companyCreditDetails[0]->total_credits : '0.00' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.status') }}</label>
                  <input class="form-control" placeholder="{{ $companyCreditDetails[0]->status ? 'Active' : 'Inactive' }}" readonly>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_date') }}</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($companyCreditDetails[0]->created_at)) }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.last_updated_date') }}</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($companyCreditDetails[0]->updated_at)) }}" readonly>
                </div>
              </div>

            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
@stop

@section('js')
@stop