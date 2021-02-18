@extends('adminlte::page')

@section('title', 'Edit Jobseeker')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Jobseeker</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">Back</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="editJobseekerForm" method="post", action="{{ route('update_jobseeker') }}">
              @csrf
              <div class="card-body form">
                <input type="hidden" name="id" class="form-control" id="id" value="{{ $jobseeker[0]->id }}">
                <div class="row">
                  <!-- <div class="col-12">
                    <div class="form-group">
                      <label for="name">Name<span class="text-danger"> *</span></label>
                      <input type="name" name="name" class="form-control" id="name" value="{{ $jobseeker[0]->name }}">
                      <i class="fa fa-edit editable_field text-success"></i>
                      <i class="fa fa-times non_editable_field text-danger"></i>
                      @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                      @endif
                    </div>
                  </div> -->
                  <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                    <div class="form-group">
                      <label for="first_name">First Name<span class="text-danger"> *</span></label>
                      <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $jobseeker[0]->first_name }}">
                      <!-- <i class="fa fa-edit editable_field text-success"></i>
                      <i class="fa fa-times non_editable_field text-danger"></i> -->
                      @if($errors->has('first_name'))
                        <div class="error">{{ $errors->first('first_name') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                    <div class="form-group">
                      <label for="last_name">Last Name<span class="text-danger"> *</span></label>
                      <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $jobseeker[0]->last_name }}">
                      <!-- <i class="fa fa-edit editable_field text-success"></i>
                      <i class="fa fa-times non_editable_field text-danger"></i> -->
                      @if($errors->has('last_name'))
                        <div class="error">{{ $errors->first('last_name') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                    <div class="form-group">
                      <label for="email">Email<span class="text-danger"> *</span></label>
                      <input type="text" name="email" class="form-control" id="email" value="{{ $jobseeker[0]->email }}" readonly>
                      <!-- <i class="fa fa-edit editable_field text-success"></i>
                      <i class="fa fa-times non_editable_field text-danger"></i> -->
                      @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                    <div class="form-group">
                      <label for="phone_number">Phone Number</label>
                      <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $jobseeker[0]->phone_number }}">
                      <!-- <i class="fa fa-edit editable_field text-success"></i>
                      <i class="fa fa-times non_editable_field text-danger"></i> -->
                      @if($errors->has('phone_number'))
                        <div class="error">{{ $errors->first('phone_number') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                    <div class="form-group radio">
                      <label for="job_alert">Job Alerts<span class="text-danger"> *</span></label><br/>
                      <input type="radio" name="job_alert" {{ ($jobseeker[0]->is_job_alert_enabled == "0")? "checked" : "" }} id="job_alert" value="0"> Disable
                      <input type="radio" class="ml-2" name="job_alert" {{ ($jobseeker[0]->is_job_alert_enabled == "1")? "checked" : "" }} id="job_alert" value="1"> Enable
                      @if($errors->has('job_alert'))
                        <div class="error">{{ $errors->first('job_alert') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
      /* $(".non_editable_field").hide();
      $('input').prop('disabled', true);
      $(".editable_field").click(function() {
        $(this).hide();
        $(this).siblings('input').prop('disabled', false);
        $(this).siblings(".non_editable_field").show();
      });
      $(".non_editable_field").click(function() {
        $(this).hide();
        $(this).siblings('input').prop('disabled', true);
        $(".editable_field").show();
      }); */
      $('#editJobseekerForm').validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
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
          name: {
            required: "The Name field is required."
          },
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