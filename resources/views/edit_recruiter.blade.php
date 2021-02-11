@extends('adminlte::page')

@section('title', 'Edit Recruiter')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert">
            <h3>Edit Recruiter</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="editRecruiterForm" method="post", action="../update">
              @csrf
              <div class="card-body">

                
                <input type="hidden" name="id" class="form-control" id="id" value="{{ $recruiter[0]->id }}">
                
                <!-- <div class="form-group">
                  <label for="name">Name</label>
                  <input type="name" name="name" class="form-control" id="name" value="{{ $recruiter[0]->name }}">
                  @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                  @endif
                </div> -->
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="first_name">First Name</label>
                      <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $recruiter[0]->first_name }}">
                      @if($errors->has('first_name'))
                        <div class="error">{{ $errors->first('first_name') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $recruiter[0]->last_name }}">
                    @if($errors->has('last_name'))
                      <div class="error">{{ $errors->first('last_name') }}</div>
                    @endif
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ $recruiter[0]->email }}">
                    @if($errors->has('email'))
                      <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $recruiter[0]->phone_number }}">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="organization_id">Organization</label>
                    <select name="organization_id" class="form-control" id="organization_id">
                    <option hidden>Select Organization</option>
                      @for($i=0; $i < count($organizations); $i++)
                        <option value="{{ $organizations[$i]->id }}" {{ ( $organizations[$i]->id == $recruiter[0]->organization_id) ? 'selected' : '' }}>{{ $organizations[$i]->name }}</option>
                      @endfor
                    </select>
                  </div>
                </div>
              </div>
            </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
    .editable_field {
      position: relative;
      top: -25px;
      right: 10px;
      float: right;
    }
    .non_editable_field {
      position: relative;
      top: -25px;
      right: 10px;
      float: right;
    }
  </style>
@stop

@section('js')
  <script>
    $(document).ready(function() {
      $('#editRecruiterForm').validate({
        ignore: [],
        debug: false,
        rules: {
          // name: {
          //   required: true
          // },
          first_name: {
            required: true
          },
          last_name: {
            required: true
          },
          email: {
            required: true,
            email: true,
          },
        },
        messages: {
          /* name: {
            required: "Name is Required"
          }, */
          first_name: {
            required: "First Name is Required"
          },
          last_name: {
            required: "Last Name is Required"
          },
          email: {
            required: "Email is Required",
            email: "Please enter a valid email"
          },
        }
      });
    });
  </script>
@stop
