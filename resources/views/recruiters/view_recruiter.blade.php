@extends('adminlte::page')

@section('title', 'Recruiter Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>Recruiter Information</h1>
    <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">Back</a>
  </div>
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form class="form_wrap">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Name</label>
                  <?php $name;
                    if($recruiter[0]->first_name) {
                      $name = $recruiter[0]->first_name.' '.$recruiter[0]->last_name;
                    }
                    else if($recruiter[0]->name) {
                      $name = $recruiter[0]->name;
                    }
                    else {
                      $name = "--";
                    }
                  ?>
                  <input class="form-control" placeholder="{{ $name }}" readonly>
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>First Name</label>
                  <input class="form-control" placeholder="--" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Last Name</label>
                  <input class="form-control" placeholder="--" readonly>
                </div>
              </div> -->
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->email ? $recruiter[0]->email : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->phone_number ? $recruiter[0]->phone_number : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Status</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->status == 1 ? 'Active' : 'Inactive' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Is Parent?</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->is_parent ? 'Yes' : 'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>IP Address</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->ip_address }}" readonly>
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Logged In With</label>
                  <input class="form-control" placeholder="Email" readonly>
                </div>
              </div> -->
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Last Logged In Date</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->last_logged_in_at ? $recruiter[0]->last_logged_in_at : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email Verification Status</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->is_email_verified ? $recruiter[0]->is_email_verified : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email Verification Date</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->email_verified_at ? $recruiter[0]->email_verified_at : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>User Locked Status</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->is_user_locked ? 'Locked' : 'Not Locked' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>User Locked Date</label>
                  <input class="form-control" placeholder="{{ $recruiter[0]->user_locked_at ? $recruiter[0]->user_locked_at : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Company Name</label>
                  <input class="form-control" placeholder="{{ $organization[0]->name ? $organization[0]->name : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="{{ $organization[0]->created_at ? $organization[0]->created_at : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Last Updated Date</label>
                  <input class="form-control" placeholder="{{ $organization[0]->updated_at ? $organization[0]->updated_at : '--' }}" readonly>
                </div>
              </div>
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
@stop