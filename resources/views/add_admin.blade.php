@extends('adminlte::page')

@section('title', 'Add Admin')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">Back</a>
            <h3>Add Admin</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="save">
              @csrf
              <div class="card-body">                
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Name<span class="text-danger"> *</span></label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                      @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                      @endif
                    </div>
                  </div>

                <div class="col-6">
                  <div class="form-group">
                    <label for="email">Email<span class="text-danger"> *</span></label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                    @if($errors->has('email'))
                      <div class="error">{{ $errors->last('email') }}</div>
                    @endif
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label for="role">Role<span class="text-danger"> *</span></label>
                    <select name="role" class="form-control" id="role">
                      <option value="" hidden>Select Role</option>
                      <?php for ($i=0; $i < count($roles); $i++) { ?> 
                        <option value="{{ $roles[$i]->id }}">{{ $roles[$i]->name }}</option>
                      <?php } ?>
                    </select>
                    @if($errors->has('role'))
                      <div class="error">{{ $errors->last('role') }}</div>
                    @endif
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label for="password">Password<span class="text-danger"> *</span></label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                    @if($errors->has('password'))
                      <div class="error">{{ $errors->last('password') }}</div>
                    @endif
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password<span class="text-danger"> *</span></label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password">
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
@stop

@section('js')
  <script>
    $(document).ready(function() {
      $('#addAdminForm').validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
          /* first_name: {
            required: true
          },
          last_name: {
            required: true
          }, */
          email: {
            required: true,
            email: true
          },
          role: {
            required: true
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
          name: {
            required: "The Name field is required."
          },
          /* first_name: {
            required: "The First Name field is required."
          },
          last_name: {
            required: "The Last Name field is required."
          }, */
          email: {
            required: "The Email field is required.",
            email: "Please enter a valid Email"
          },
          role: {
            required: "The Role field is required."
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
        }
      });
    });
  </script>
@stop
