@extends('adminlte::page')

@section('title', 'Add Jobseeker')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert">
            <h3>Add Jobseeker</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addJobseekerForm" method="post", action="save">
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

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="first_name">First Name</label>
                      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter first_name">
                      @if($errors->has('first_name'))
                        <div class="error">{{ $errors->first('first_name') }}</div>
                      @endif
                    </div>
                  </div>
                    
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="last_name">Last Name</label>
                      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter last_name">
                      @if($errors->has('last_name'))
                        <div class="error">{{ $errors->last('last_name') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                      @if($errors->has('email'))
                        <div class="error">{{ $errors->last('email') }}</div>
                      @endif
                    </div>
                  </div>
                    
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                      @if($errors->has('password'))
                        <div class="error">{{ $errors->last('password') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter confirm_password">
                      @if($errors->has('confirm_password'))
                        <div class="error">{{ $errors->last('confirm_password') }}</div>
                      @endif
                    </div>
                  </div>
                </div>

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
      $('#addJobseekerForm').validate({
        ignore: [],
        debug: false,
        rules: {
          /* name: {
            required: true
          }, */
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
        },
        messages: {
          /* name: {
            required: "Name is Required"
          }, */
          first_name: {
            required: "The First Name field is required."
          },
          last_name: {
            required: "The Last Name field is required."
          },
          email: {
            required: "The Email field is required.",
            email: "Please enter a valid email address."
          },
          password: {
            required: "The Password field is required.",
            minlength: "Please enter at least 8 characters."
          },
          confirm_password: {
            required: "The password confirmation field is required.",
            minlength: "Please enter at least 8 characters.",
            equalTo : "The confirm password must match password."
          },
        }
      });
    });
  </script>
@stop
