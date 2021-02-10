@extends('adminlte::page')

@section('title', 'Add Recruiter')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Add Recruiter</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addCustomerForm" method="post", action="{{ route('save_customer') }}">
              @csrf
              <div class="card-body">
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
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="name">Company Name<span class="text-danger"> *</span></label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Company Name">
                      @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                      @endif
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="email">Company Or Consultants Email<span class="text-danger"> *</span></label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Enter Company Email">
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
                      <label for="contact_number">Contact Number<span class="text-danger"> *</span></label>
                      <input type="text" name="contact_number" class="form-control" id="contact_number" placeholder="Enter Contact Number">
                      @if($errors->has('contact_number'))
                        <div class="error">{{ $errors->first('contact_number') }}</div>
                      @endif
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="vat_number">VAT Number (Optional)</label>
                      <input type="text" name="vat_number" class="form-control" id="vat_number" placeholder="Enter VAT Number">
                      @if($errors->has('vat_number'))
                        <div class="error">{{ $errors->first('vat_number') }}</div>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="url">Company Domain URL<span class="text-danger"> *</span></label>
                      <input type="text" name="url" class="form-control" id="url" placeholder="http://example.com">
                      @if($errors->has('url'))
                        <div class="error">{{ $errors->first('url') }}</div>
                      @endif
                    </div>
                  </div>

                  <!-- ADDRESS FIELDS -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="address">Address<span class="text-danger"> *</span></label>
                      <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                      @if($errors->has('address'))
                        <div class="error">{{ $errors->first('address') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="city">City<span class="text-danger"> *</span></label>
                      <input type="text" name="city" class="form-control" id="locality" placeholder="Enter City">
                      @if($errors->has('city'))
                        <div class="error">{{ $errors->first('city') }}</div>
                      @endif
                    </div>
                  </div>
                    
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="state">State<span class="text-danger"> *</span></label>
                      <input type="text" name="state" class="form-control" id="administrative_area_level_1" placeholder="Enter State">
                      @if($errors->has('state'))
                        <div class="error">{{ $errors->first('state') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="pincode">Postal Code<span class="text-danger"> *</span></label>
                      <input type="text" name="pincode" class="form-control" id="postal_code" placeholder="Enter Pin Code">
                      @if($errors->has('pincode'))
                        <div class="error">{{ $errors->first('pincode') }}</div>
                      @endif
                    </div>
                  </div>
                    
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="country">Country<span class="text-danger"> *</span></label>
                      <input type="text" name="country" class="form-control" id="country" placeholder="Enter Country">
                      @if($errors->has('country'))
                        <div class="error">{{ $errors->first('country') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="county">County<span class="text-danger"> *</span></label>
                      <input type="text" name="county" class="form-control" id="county" placeholder="Enter County">
                      @if($errors->has('county'))
                        <div class="error">{{ $errors->first('county') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
                
                <!-- Form Fields -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button id="submitButton" class="btn btn-primary">Submit</button>
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
    .error {
      color: #ff0000;
      font-weight: 500 !important;
    }
  </style>
@stop

@section('js')
  <script>
    $(document).ready(function() {
      var addCustomerForm = $( "#addCustomerForm" );
      $("#email").blur(function() {
        $.ajax({
          type:"GET",
          url:"{{ route('check_email') }}",
          data: {
            email: $(this).val()
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
      addCustomerForm.validate({
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
            required: true
          },
          address: {
            required: true
          },
          city: {
            required: true
          },
          state: {
            required: true
          },
          pincode: {
            required: true
          },
          country: {
            required: true
          },
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
            required: "The Domain URL field is required."
          },
          address: {
            required: "The Address field is required."
          },
          city: {
            required: "The City field is required."
          },
          state: {
            required: "The State field is required."
          },
          pincode: {
            required: "The Postal Code field is required."
          },
          country: {
            required: "The Country field is required."
          },
          county: {
            required: "The County field is required."
          },
        },
        onkeyup: false,
        onblur: true
      });
    });
  </script>
  <!-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHMC5v6vhu2I3uOdqKaMDUEiQJiqYhoeo&libraries=places&callback=initAutocomplete"></script>
  <script>
    let placeSearch;
    let autocomplete;
    const componentForm = {
      locality: "long_name",
      administrative_area_level_1: "short_name",
      country: "long_name",
      postal_code: "short_name",
    };

    function initAutocomplete() {
      // Create the autocomplete object, restricting the search predictions to
      // geographical location types.
      autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("autocomplete"),
        { types: ["geocode"] }
      );
      // Avoid paying for data that you don't need by restricting the set of
      // place fields that are returned to just the address components.
      autocomplete.setFields(["address_component"]);
      // When the user selects an address from the drop-down, populate the
      // address fields in the form.
      autocomplete.addListener("place_changed", fillInAddress);
    }

    function fillInAddress() {
      // Get the place details from the autocomplete object.
      const place = autocomplete.getPlace();

      for (const component in componentForm) {
        document.getElementById(component).value = "";
        document.getElementById(component).disabled = false;
      }

      // Get each component of the address from the place details,
      // and then fill-in the corresponding field on the form.
      for (const component of place.address_components) {
        const addressType = component.types[0];

        if (componentForm[addressType]) {
          const val = component[componentForm[addressType]];
          document.getElementById(addressType).value = val;
        }
      }
    }
  </script> -->
@stop
