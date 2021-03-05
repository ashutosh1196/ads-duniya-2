@extends('adminlte::page')

@section('title', 'Customer Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>{{ __('adminlte::adminlte.customer_information') }}</h1>
    <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">Back</a>
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
          <?php
            $websiteImagesPath = config("website_url").'images/companyLogos/';
            $adminImagesPath = asset('').'images/';
            $logo = $viewCustomer[0]->logo != null ? $websiteImagesPath.$viewCustomer[0]->logo : $adminImagesPath.'avatar.png';
          ?>

          <!-- <img src="{{ $logo }}" alt="{{ $viewCustomer[0]->name }}" class="profile" style="width:100px;"> -->
         
          <form class="form_wrap">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.company_name') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->name }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.company_or_consultants_email') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->email }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.contact_number') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->contact_number ? $viewCustomer[0]->contact_number : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.vat_number') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->vat_number ? $viewCustomer[0]->vat_number : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.company_domain_url') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->url ? $viewCustomer[0]->url : '' }}" readonly>
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.company_domain') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->domain ? $viewCustomer[0]->domain : '' }}" readonly>
                </div>
              </div> -->
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.address') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->address ? $viewCustomer[0]->address : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.city') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->city ? $viewCustomer[0]->city : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.county') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->county ? $viewCustomer[0]->county : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.state') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->state ? $viewCustomer[0]->state : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.country') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->country ? $viewCustomer[0]->country : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.zip') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->pincode ? $viewCustomer[0]->pincode : '' }}" readonly>
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Location</label>
                  <input class="form-control" readonly>
                </div>
              </div> -->
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.whitelist_status') }}
                    <!-- <a href="../whitelist/{{$viewCustomer[0]->id}}" title="Whitelist" class="pl-2"><i class="text-success fa fa-check-circle"></i></a>
                    <a href="../reject/{{$viewCustomer[0]->id}}" title="Reject"><i class="text-danger fa fa-times-circle" style="margin-left:5px;"></i></a> -->
                  </label>
                  <?php $whitelistStatus;
                  if($viewCustomer[0]->is_whitelisted == 0) {
                    $whitelistStatus = "Pending";
                  }
                  elseif($viewCustomer[0]->is_whitelisted == 1) {
                    $whitelistStatus = "Whitelisted";
                  }
                  elseif($viewCustomer[0]->is_whitelisted == 2) {
                    $whitelistStatus = "Rejected";
                  } ?>
                  <input class="form-control" placeholder="{{ $whitelistStatus }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_by') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->created_by ? $viewCustomer[0]->created_by : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_date') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->created_at ? date('d/m/y', strtotime($viewCustomer[0]->created_at)) : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.last_updated_date') }}</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->updated_at ? date('d/m/y', strtotime($viewCustomer[0]->updated_at)) : '' }}" readonly>
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
