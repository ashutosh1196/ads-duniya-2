@extends('adminlte::page')

@section('title', 'Payment Transaction Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>{{ __('adminlte::adminlte.payment_transaction_information') }}</h1>
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
                  <input class="form-control" placeholder="{{ $organization['name'] ? $organization['name'] : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.recruiter_name') }}</label>
                  <input class="form-control" placeholder="{{ $recruiter->name ? $recruiter->name : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.amount') }}</label>
                  <input class="form-control" placeholder="${{ $paymentTransaction->amount ? $paymentTransaction->amount : '0.00' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.transaction_id') }}</label>
                  <input class="form-control" placeholder="{{ $paymentTransaction->transaction_id ? $paymentTransaction->transaction_id : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.status') }}</label>
                  <input class="form-control" placeholder="{{ $paymentTransaction->status ? ucfirst($paymentTransaction->status) : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.payment_date') }}</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($paymentTransaction->payment_date)) }}" readonly>
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
