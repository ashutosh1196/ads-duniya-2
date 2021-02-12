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
          <!-- <table class="table form">
            <tr>
              <img src="{{ $logo }}" alt="{{ $viewCustomer[0]->name }}" style="width:100px;">
            </tr>
            <tr>
            <tr>
              <th>Name </th>
              <td>{{ $viewCustomer[0]->name }}</td>
            </tr>
            <tr>
            <tr>
              <th>Email</th>
              <td>{{ $viewCustomer[0]->email }}</td>
            </tr>
            <tr>
              <th>Phone Number</th>
              <td>{{ $viewCustomer[0]->contact_number ? $viewCustomer[0]->contact_number : '--' }}</td>
            </tr>
            <tr>
              <th>VAT Number</th>
              <td>{{ $viewCustomer[0]->vat_number ? $viewCustomer[0]->vat_number : '--' }}</td>
            </tr>
            <tr>
              <th>Website URL</th>
              <td>{{ $viewCustomer[0]->url ? $viewCustomer[0]->url : '--' }}</td>
            </tr>
            <tr>
              <th>Domain</th>
              <td>{{ $viewCustomer[0]->domain ? $viewCustomer[0]->domain : '--' }}</td>
            </tr>
            <tr>
              <th>Address</th>
              <td>{{ $viewCustomer[0]->address ? $viewCustomer[0]->address : '--' }}</td>
            </tr>
            <tr>
              <th>City</th>
              <td>{{ $viewCustomer[0]->city ? $viewCustomer[0]->city : '--' }}</td>
            </tr>
            <tr>
              <th>State</th>
              <td>{{ $viewCustomer[0]->state ? $viewCustomer[0]->state : '--' }}</td>
            </tr>
            <tr>
              <th>Country</th>
              <td>{{ $viewCustomer[0]->country ? $viewCustomer[0]->country : '--' }}</td>
            </tr>
            <tr>
              <th>Zip Code</th>
              <td>{{ $viewCustomer[0]->pincode ? $viewCustomer[0]->pincode : '--' }}</td>
            </tr>
            <tr>
              <th>Location</th>
              <td>{{ $viewCustomer[0]->latitude }}<br/>{{ $viewCustomer[0]->longitude }}</td>
            </tr>
            <tr>
              <th>Whitelisted Status</th>
              <td>
                @if($viewCustomer[0]->is_whitelisted == 0)
                  <span style="margin-right:20px;">Pending</span>
                  <a href="../whitelist/{{$viewCustomer[0]->id}}" title="Whitelist"><i class="text-success fa fa-check-circle"></i></a>
                  <a href="../reject/{{$viewCustomer[0]->id}}" title="Reject"><i class="text-danger fa fa-times-circle" style="margin-left:5px;"></i></a>
                @elseif($viewCustomer[0]->is_whitelisted == 1)
                  <span style="margin-right:20px;">Whitelisted</span>
                  <a href="../reject/{{$viewCustomer[0]->id}}" title="Reject"><i class="text-danger fa fa-times-circle" style="margin-left:5px;"></i></a>
                @elseif($viewCustomer[0]->is_whitelisted == 2)
                  <span style="margin-right:20px;">Rejected</span>
                  <a href="../whitelist/{{$viewCustomer[0]->id}}" title="Whitelist"><i class="text-success fa fa-check-circle"></i></a>
                @endif
              </td>
            </tr>
            <tr>
              <th>Created By</th>
              <td>{{ $viewCustomer[0]->created_by ? $viewCustomer[0]->created_by : '--' }}</td>
            </tr>
            <tr>
              <th>Created Date</th>
              <td>{{ date('F d, Y - H:i A', strtotime($viewCustomer[0]->created_at)) }}</td>
            </tr>
            <tr>
              <th>Last Updated date</th>
              <td>{{ date('F d, Y - H:i A', strtotime($viewCustomer[0]->updated_at)) }}</td>
            </tr>
          </table> -->

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
                  <input class="form-control" placeholder="{{ $viewCustomer[0]->contact_number ? $viewCustomer[0]->contact_number : '--' }}" readonly>
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
