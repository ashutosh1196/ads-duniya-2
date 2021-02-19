@extends('adminlte::page')

@section('title', 'Payment Transactions Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>{{ __('adminlte::adminlte.payment_information') }}</h1>
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
                  <label>{{ __('adminlte::adminlte.amount') }}</label>
                  <input class="form-control" placeholder="${{ $paymentHistory[0]->credits ? $paymentHistory[0]->credits : '0.00' }}" readonly>
                </div>
              </div>
              
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.payment_date') }}</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($paymentHistory[0]->created_at)) }}" readonly>
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
