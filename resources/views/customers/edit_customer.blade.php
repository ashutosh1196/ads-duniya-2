@extends('adminlte::page')

@section('title', 'Edit Customer')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>{{ __('adminlte::adminlte.edit_customer') }}</h3>
            <a class="btn col-sm-1 btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="editCustomerForm" method="post", action="{{ route('update_customer') }}">
              @csrf
              <div class="card-body form">
                @if ($errors->any())
                  <div class="alert alert-warning">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                
                <!-- Form Fields -->
                <input type="hidden" name="id" id="customer_id" value="{{ $customer[0]->id }}">
                <input type="hidden" name="from_page" id="from_page" value="{{ $from_page }}">
                <!-- INFORMATION FIELDS -->
                <div class="">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">{{ __('adminlte::adminlte.company_name') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $customer[0]->name }}" maxlength="100" disabled>
                        @if($errors->has('name'))
                          <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">{{ __('adminlte::adminlte.company_or_consultants_email') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="email" class="form-control" id="email" value="{{ $customer[0]->email }}" readonly maxlength="100">
                        <div id ="email_error" class="error"></div>
                        @if($errors->has('email'))
                          <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="contact_number">{{ __('adminlte::adminlte.contact_number') }}<span class="text-danger"> *</span></label>
                        <input id="jquery-intl-phone" type="tel" class="form-control" name="contact_number" maxlength="13" value="{{ $customer[0]->contact_number }}">
                        @if($errors->has('contact_number'))
                          <div class="error">{{ $errors->first('contact_number') }}</div>
                        @endif
                        <input type="hidden" name="country_code" value="{{ $customer[0]->country_code ? $customer[0]->country_code : '+44' }}">
                      </div>
                    </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="vat_number">{{ __('adminlte::adminlte.vat_number') }}</label>
                          <input type="text" name="vat_number" class="form-control" id="vat_number" value="{{ $customer[0]->vat_number }}" maxlength="100">
                          @if($errors->has('vat_number'))
                            <div class="error">{{ $errors->first('vat_number') }}</div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="url">{{ __('adminlte::adminlte.company_domain_url') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="url" class="form-control" id="url" value="{{ $customer[0]->url }}" maxlength="100">
                        @if($errors->has('url'))
                          <div class="error">{{ $errors->first('url') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="address">{{ __('adminlte::adminlte.address') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="address" class="form-control" id="autocomplete" value="{{ $customer[0]->address }}" maxlength="100">
                        @if($errors->has('address'))
                          <div class="error">{{ $errors->first('address') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="city">{{ __('adminlte::adminlte.city') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="city" class="form-control" id="city" value="{{ $customer[0]->city }}" maxlength="100">
                        @if($errors->has('city'))
                          <div class="error">{{ $errors->first('city') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="county">{{ __('adminlte::adminlte.county') }}</label>
                        <input type="text" name="county" class="form-control" id="county" value="{{ $customer[0]->county }}" maxlength="100">
                        @if($errors->has('county'))
                          <div class="error">{{ $errors->first('county') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                      
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="state">{{ __('adminlte::adminlte.state') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="state" class="form-control" id="state" value="{{ $customer[0]->state }}" maxlength="100">
                        @if($errors->has('state'))
                          <div class="error">{{ $errors->first('state') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="country">{{ __('adminlte::adminlte.country') }}<span class="text-danger"> *</span></label>
                          <select name="country" class="form-control" id="country" >
                            <option value="" hidden>{{ __('adminlte::adminlte.select_country') }}</option>
                            @for($i=0; $i < count($countries); $i++)
                            <?php rsort($countries); ?>
                              <option value="{{ $countries[$i]['name'] }}" {{ ( $countries[$i]['name'] == $customer[0]->country) ? 'selected' : '' }}>{{ $countries[$i]['name'] }}</option>
                            @endfor
                          </select>
                          @if($errors->has('country'))
                            <div class="error">{{ $errors->first('country') }}</div>
                          @endif
                        </div>
                    </div>
                  </div>
                      
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="pincode">{{ __('adminlte::adminlte.zip') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="pincode" class="form-control" id="pincode" value="{{ $customer[0]->pincode }}" maxlength="7">
                        @if($errors->has('pincode'))
                          <div class="error">{{ $errors->first('pincode') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /ADDRESS FIELDS -->

                <!-- Form Fields -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button id="submitButton" class="btn btn-primary">{{ __('adminlte::adminlte.update') }}</button>
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
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
    li.country { display: none; }
    li.divider { display: none; }
    li.country.preferred { display: block; }
  </style>
@stop

@section('js')
  <script>
    $(document).ready(function() {
      if($('.country-list .country').data('dial-code') == );
      $( "input[name=contact_number]" ).focus(function() {
        alert($('.country-list .country.active').data('dial-code'));
        $('input[name=country_code]').val($('.country-list .country.active').data('dial-code'));
      });
      $("#email").blur(function() {
        $.ajax({
          type:"GET",
          url:"{{ route('check_email') }}",
          data: {
            email: $(this).val(),
            id: $("#customer_id").val(),
            table_name: 'organizations'
          },
          success: function(result) {
            if(result) {
              $("#email_error").html("This email is already registered.");
            }
            else {
              $("#email_error").html("");
            }
          }
        });
      });
      var editCustomerForm = $( "#editCustomerForm" );
      editCustomerForm.validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
          },
          contact_number: {
            required: true
          },
          url: {
            required: true,
            url: true
          },
          address: {
            required: true
          },
          city: {
            required: true
          },
          pincode: {
            required: true,
            maxlength: 7
          },
          country: {
            required: true
          },
          state: {
            required: true
          },
          /* county: {
            required: true
          }, */
        },
        messages: {
          name: {
            required: "The Company Name field is required."
          },
          email: {
            required: "The Company Name field is required.",
          },
          contact_number: {
            required: "The Contact Number field is required."
          },
          url: {
            required: "The Domain URL field is required.",
            url: "The Company Domain URL must be valid."
          },
          address: {
            required: "The Address field is required."
          },
          city: {
            required: "The City / Town field is required."
          },
          pincode: {
            required: "The Zip / Postcode field is required."
          },
          country: {
            required: "The Country field is required."
          },
          state: {
            required: "The State field is required."
          },
          /* county: {
            required: "The County field is required."
          }, */
        },
        onkeyup: false,
        onblur: true
      });
    });
  </script>
  <!-- <script>
    var autocomplete = new google.maps.places.Autocomplete(
      document.getElementById("autocomplete")
    );
    autocomplete.addListener('place_changed', function(e) {
      var place = autocomplete.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();

      var postal_code = '';
      var country = '';
      var city = '';
      var county = '';
      var state = '';
      for (var i = 0; i < place.address_components.length; i++) {
        if(place.address_components[i].types.indexOf("postal_code") != -1) {
          postal_code = place.address_components[i].long_name;
        }
        if(place.address_components[i].types.indexOf("country") != -1) {
          country = place.address_components[i].long_name;
        }
        if(place.address_components[i].types.indexOf("locality") != -1) {
          city = place.address_components[i].long_name;
        }
        if(place.address_components[i].types.indexOf("sublocality_level_1") != -1) {
          county = place.address_components[i].long_name;
        }
        if(place.address_components[i].types.indexOf("administrative_area_level_1") != -1) {
          state = place.address_components[i].long_name;
        }
        console.log(place.address_components[i].types);
        console.log(place.address_components[i].long_name);
        console.log('=========');
      }
      document.getElementById('city').value = city;
      document.getElementById('state').value = state;
      document.getElementById('pincode').value = postal_code;
      document.getElementById('county').value = county;
      document.getElementById('country').value = country;
    });
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKW4P7mmbMBCf48mhUTBKvpHfLDhPgP1c&libraries=places" async defer></script> -->
@stop
