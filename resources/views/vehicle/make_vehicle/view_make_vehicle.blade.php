@extends('adminlte::page')

@section('title', 'Make Information')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
         <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Make Information</h3>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">back</a>
        </div>       
        <div class="card-body">
          <!-- @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif -->

          <form class="form_wrap">

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>English</label>
                  <input class="form-control" placeholder="{{ $makeList[0]->brand_name_en }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>French</label>
                  <input class="form-control" placeholder="{{ $makeList[0]->brand_name_fr }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Haitian Creole</label>
                  <input class="form-control" placeholder="{{ $makeList[0]->brand_name_ht }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Spanish</label>
                  <input class="form-control" placeholder="{{ $makeList[0]->brand_name_es }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Brand</label>
                  @if($makeList[0]->brand_for==0)
                        @php 
                          $brand = 'Car';
                        @endphp
                      @endif
                      @if($makeList[0]->brand_for==1)
                     @php 
                          $brand = 'Moto';
                        @endphp
                      @endif
                      @if($makeList[0]->brand_for==2)
                        @php 
                          $brand = 'Power Equipment';
                        @endphp
                      @endif
                      @if($makeList[0]->brand_for==3)
                        @php 
                          $brand = 'Auto and Moto Parts';
                        @endphp
                      @endif
                  <input class="form-control" placeholder="{{ $brand }}" readonly>
                </div>
              </div>

             <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="{{ $makeList[0]->created_at ? date('d/m/y', strtotime($makeList[0]->created_at)) : '' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Last Updated Date</label>
                  <input class="form-control" placeholder="{{ $makeList[0]->updated_at ? date('d/m/y', strtotime($makeList[0]->updated_at)) : '' }}" readonly>
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
  <style>
    .industry-description { font-size: 13px; }
  </style>
@stop

@section('js')
@stop
