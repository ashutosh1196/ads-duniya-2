@extends('adminlte::page')

@section('title', 'Customer Information')

@section('content_header')
  <h1>Customer Information</h1>
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
          <table class="table">
            <tr>
              <?php
                $websiteImagesPath = env("WEBSITE_URL").'images/companyLogos/';
                $adminImagesPath = env("ADMIN_URL").'images/';
                $logo = $viewCustomer[0]->logo != null ? $websiteImagesPath.$viewCustomer[0]->logo : $adminImagesPath.'avatar.png';
              ?>
              <img src="{{ $logo }}" alt="{{ $viewCustomer[0]->name }}">
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
                  <span>Pending</span>
                  <a href="../whitelist/{{$viewCustomer[0]->id}}" title="Whitelist"><i class="text-success fa fa-check-circle"></i></a>
                  <a href="../reject/{{$viewCustomer[0]->id}}" title="Reject"><i class="text-danger fa fa-times-circle"></i></a>
                @elseif($viewCustomer[0]->is_whitelisted == 1)
                  <span>Whitelisted</span>
                  <a href="../reject/{{$viewCustomer[0]->id}}" title="Reject"><i class="text-danger fa fa-times-circle"></i></a>
                @elseif($viewCustomer[0]->is_whitelisted == 2)
                  <span>Rejected</span>
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
@stop
