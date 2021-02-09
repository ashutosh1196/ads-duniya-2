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

                <div class="form-group">
                  <label for="name">Company Name<span class="text-danger"> *</span></label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Company Name">
                  @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="email">Company Or Consultants Email<span class="text-danger"> *</span></label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Enter Company Email">
                  @if($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="contact_number">Contact Number<span class="text-danger"> *</span></label>
                  <input type="text" name="contact_number" class="form-control" id="contact_number" placeholder="Enter Contact Number">
                  @if($errors->has('contact_number'))
                    <div class="error">{{ $errors->first('contact_number') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="vat_number">VAT Number (Optional)</label>
                  <input type="text" name="vat_number" class="form-control" id="vat_number" placeholder="Enter VAT Number">
                  @if($errors->has('vat_number'))
                    <div class="error">{{ $errors->first('vat_number') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="url">Company Domain URL<span class="text-danger"> *</span></label>
                  <input type="text" name="url" class="form-control" id="url" placeholder="http://example.com">
                  @if($errors->has('url'))
                    <div class="error">{{ $errors->first('url') }}</div>
                  @endif
                </div>
                
                <!-- Form Fields -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary">Submit</button>
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
      $('#addCustomerForm').validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
          email: {
            required: true
          },
          contact_number: {
            required: true
          },
          url: {
            required: true
          },
        },
        messages: {
          name: {
            required: "The Company Name field is required."
          },
          email: {
            required: "The Company Name field is required."
          },
          contact_number: {
            required: "The Contact Number field is required."
          },
          url: {
            required: "The Domain URL field is required."
          },
        }
      });
    });
  </script>
@stop
