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
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">Back</a>
            <h3>Add Recruiter</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <form id="addRecruiterForm" method="post" action="{{ route('save_recruiter') }}">
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
                      <label for="first_name">First Name<span class="text-danger"> *</span></label>
                      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name">
                      @if($errors->has('first_name'))
                        <div class="error">{{ $errors->first('first_name') }}</div>
                      @endif
                    </div>
                  </div>
                
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="last_name">Last Name<span class="text-danger"> *</span></label>
                      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
                      @if($errors->has('last_name'))
                        <div class="error">{{ $errors->last('last_name') }}</div>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="phone_number">Contact Number</label>
                      <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Enter Contact Number">
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="email">Email<span class="text-danger"> *</span></label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                      @if($errors->has('email'))
                        <div class="error">{{ $errors->last('email') }}</div>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="password">Password<span class="text-danger"> *</span></label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                      @if($errors->has('password'))
                        <div class="error">{{ $errors->last('password') }}</div>
                      @endif
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="confirm_password">Confirm Password<span class="text-danger"> *</span></label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password">
                      @if($errors->has('confirm_password'))
                        <div class="error">{{ $errors->last('confirm_password') }}</div>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="organization_id">Company<span class="text-danger"> *</span></label>
                      <select name="organization_id" class="form-control" id="organization_id" >
                        <option value="" hidden>Select Company</option>
                        <?php for($i=0; $i<count($companies); $i++) { ?>
                          <option value="{{ $companies[$i]->id }}">{{ $companies[$i]->name }}</option>
                        <?php } ?>
                      </select>
                      @if($errors->has('organization_id'))
                        <div class="error">{{ $errors->first('organization_id') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- /Form Fields -->

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
@stop

@section('js')
  <script>
    $(document).ready(function() {
      $('#addRecruiterForm').validate({
        ignore: [],
        debug: false,
        rules: {
          first_name: {
            required: true
          },
          last_name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 8
          },
          confirm_password: {
            required: true,
            minlength: 8,
            equalTo : "#password"
          },
          organization_id: {
            required: true
          },
        },
        messages: {
          first_name: {
            required: "The First Name field Name is required."
          },
          last_name: {
            required: "The Last Name field Name is required."
          },
          email: {
            required: "The Email field is required.",
            email: "Please enter a valid Email"
          },
          password: {
            required: "The Password field is required.",
            minlength: "Minimum length should be 8"
          },
          confirm_password: {
            required: "The Confirm Password field is required.",
            minlength: "Minimum length should be 8",
            equalTo : "The Confirm Password must be equal to Password."
          },
          organization_id: {
            required: "The Company field is required."
          }
        }
      });
    });
  </script>
@stop
