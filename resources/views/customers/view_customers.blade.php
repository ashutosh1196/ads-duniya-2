@extends('adminlte::page')

@section('title', 'Customer Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>Customer Information</h1>
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
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Company Name</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->name }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Company Or Consultants Email</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->email }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Contact Number</label>
                  <input class="form-control" placeholder="(+{{ $viewCustomer[0]->country_code }}) {{ $viewCustomer[0]->contact_number ? $viewCustomer[0]->contact_number : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>VAT Number</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->vat_number ? $viewCustomer[0]->vat_number : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Company Domain URL</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->url ? $viewCustomer[0]->url : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Company Domain</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->domain ? $viewCustomer[0]->domain : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->address ? $viewCustomer[0]->address : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>City</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->city ? $viewCustomer[0]->city : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>State</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->state ? $viewCustomer[0]->state : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Country</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->country ? $viewCustomer[0]->country : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Zip Code</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->pincode ? $viewCustomer[0]->pincode : '--' }}" readonly>
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Location</label>
                  <input class="form-control" placeholder="" readonly>
                </div>
              </div> -->
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Whitelist Status
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
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Created By</label>
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->created_by ? $viewCustomer[0]->created_by : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($viewCustomer[0]->created_at)) }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="form-group">
                  <label>Last Updated Date</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($viewCustomer[0]->updated_at)) }}" readonly>
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
