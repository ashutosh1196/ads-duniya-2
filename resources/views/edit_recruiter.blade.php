@extends('adminlte::page')

@section('title', 'Edit Recruiter')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Recruiter</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">Back</a>
          </div>
          <div class="card-body form">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="editRecruiterForm" method="post", action="{{ route('update_recruiter') }}">
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
                <input type="hidden" name="id" value="{{ $recruiter[0]->id }}">
                <!-- Form Fields -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="first_name">First Name<span class="text-danger"> *</span></label>
                      <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $recruiter[0]->first_name }}">
                      @if($errors->has('first_name'))
                        <div class="error">{{ $errors->first('first_name') }}</div>
                      @endif
                    </div>
                  </div>
                
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="last_name">Last Name<span class="text-danger"> *</span></label>
                      <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $recruiter[0]->last_name }}">
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
                      <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $recruiter[0]->phone_number }}">
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="email">Email<span class="text-danger"> *</span></label>
                      <input type="text" name="email" class="form-control" id="email" value="{{ $recruiter[0]->email }}">
                      @if($errors->has('email'))
                        <div class="error">{{ $errors->last('email') }}</div>
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
                        @for($i=0; $i < count($organizations); $i++)
                          <option value="{{ $organizations[$i]->id }}" {{ ( $organizations[$i]->id == $recruiter[0]->organization_id) ? 'selected' : '' }}>{{ $organizations[$i]->name }}</option>
                        @endfor
                      </select>
                      @if($errors->has('organization_id'))
                        <div class="error">{{ $errors->first('organization_id') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- /Form Fields -->

              </div>
            </div>
              <!-- /.card-body -->
              <div class="card-footer submit">
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
            required: "The Name field is required."
          }, */
          first_name: {
            required: "The First Name field is required."
          },
          last_name: {
            required: "The Last Name field is required."
          },
          email: {
            required: "The Email field is required.",
            email: "Please enter a valid email"
          },
        }
      });
    });
  </script>
@stop
