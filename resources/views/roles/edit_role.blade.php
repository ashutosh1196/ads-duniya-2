@extends('adminlte::page')

@section('title', 'Edit Role')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">Back</a>
            <h3>{{ __('adminlte::adminlte.add_role') }}</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addRoleForm" method="post", action="{{ route('update_role') }}">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="name">{{ __('adminlte::adminlte.name') }}</label>
                      <input type="hidden" name="id" value="{{ $role->id }}">
                      <input type="text" name="name" class="form-control" id="name" value="{{ $role->name }}" maxlength="100">
                      @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                      @endif
                    </div>
                  </div>
                </div>

                <label for="permissions" class="label">{{ __('adminlte::adminlte.permissions') }}</label><br><br>
                <input type="checkbox" id="full_access" style="height: 15px;width: 50px;" class=""><strong>FULL ACCESS</strong><br><br>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Customers</strong></p>
                      <input type="checkbox" id="customer_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($customersPermissions as $permission) {
                          $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                          foreach($permissionRoles as $permissionRole) { ?>
                            
                          <?php } ?>
                          <input type="checkbox" class="checkBoxClass customerscheckBox" name="permissions[]" value="{{ $permission->id }}" id="customers_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                        <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Recruiters</strong></p>
                      <input type="checkbox" id="recruiter_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                      <?php foreach($recruitersPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass recruiterscheckBox" name="permissions[]" value="{{ $permission->id }}" id="recruiters_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Jobseekers</strong></p>
                      <input type="checkbox" id="jobseeker_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($jobseekersPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass jobseekerscheckBox" name="permissions[]" value="{{ $permission->id }}" id="jobseekers_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Admins</strong></p>
                      <input type="checkbox" id="admins_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($adminsPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass adminscheckBox" name="permissions[]" value="{{ $permission->id }}" id="admins_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Jobs</strong></p>
                      <input type="checkbox" id="jobs_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($jobsPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass jobscheckBox" name="permissions[]" value="{{ $permission->id }}" id="jobs_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Job History</strong></p>
                      <input type="checkbox" id="job_history_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($jobHistoryPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass jobHistorycheckBox" name="permissions[]" value="{{ $permission->id }}" id="jobHistory_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Company Credits</strong></p>
                      <input type="checkbox" id="credits_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($companyCreditsPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) { ?>
                          
                        <?php } ?>
                        <input type="checkbox" class="checkBoxClass companyCreditscheckBox" name="permissions[]" value="{{ $permission->id }}" id="companyCredits_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Company Credits History</strong></p>
                      <input type="checkbox" id="credits_history_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($companyCreditsHistoryPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass companyCreditsHistorycheckBox" name="permissions[]" value="{{ $permission->id }}" id="companyCreditsHistory_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Payment Transactions</strong></p>
                      <input type="checkbox" id="payments_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($paymentTransactionsPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass paymentTransactionscheckBox" name="permissions[]" value="{{ $permission->id }}" id="paymentTransactions_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Tickets Credits</strong></p>
                      <input type="checkbox" id="tickets_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($ticketsPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass ticketscheckBox" name="permissions[]" value="{{ $permission->id }}" id="tickets_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Job Industries</strong></p>
                      <input type="checkbox" id="job_industries_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($jobIndustriesPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass jobIndustriescheckBox" name="permissions[]" value="{{ $permission->id }}" id="jobIndustries_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Job Locations</strong></p>
                      <input type="checkbox" id="job_locations_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($jobLocationsPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass jobLocationscheckBox" name="permissions[]" value="{{ $permission->id }}" id="jobLocations_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Skills</strong></p>
                      <input type="checkbox" id="skills_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($skillsPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass skillscheckBox" name="permissions[]" value="{{ $permission->id }}" id="skills_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Cities</strong></p>
                      <input type="checkbox" id="cities_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($citiesPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass citiescheckBox" name="permissions[]" value="{{ $permission->id }}" id="cities_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Counties</strong></p>
                      <input type="checkbox" id="counties_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($countiesPermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass countiescheckBox" name="permissions[]" value="{{ $permission->id }}" id="counties_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <p><strong class="list-text">Restore Data</strong></p>
                      <input type="checkbox" id="restore_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                      <strong class="list-text">Select All</strong>
                      <p id="checkBoxes">
                        <?php foreach($restorePermissions as $permission) {
                        $permissionRoles = \DB::table('permission_role')->where('role_id', $role->id)->where('permission_id', $permission->id)->get();
                        foreach($permissionRoles as $permissionRole) {} ?>
                        <input type="checkbox" class="checkBoxClass restorecheckBox" name="permissions[]" value="{{ $permission->id }}" id="restore_{{ $permission->id }}" style="height: 15px;width: 50px;" {{ $permission->id == $permissionRole->permission_id ? 'checked' : '' }}><span class="list-text">{{ $permission->name }}</span><br/>
                      <?php } ?>
                      </p>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('adminlte::adminlte.save') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    strong.list-text {
      position: relative;
      left: -8px;
      top: -3px;
    }
    span.list-text {
      position: relative;
      left: -8px;
      top: -3px;
    }
  </style>
@stop

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#full_access").click(function() {
        $("input[type=checkbox]").prop('checked', this.checked)
      })
      $("#customer_permissions").click(function() {
        $(".customerscheckBox").prop('checked', this.checked)
      })
      $("#recruiter_permissions").click(function() {
        $(".recruiterscheckBox").prop('checked', this.checked)
      })
      $("#jobseeker_permissions").click(function() {
        $(".jobseekerscheckBox").prop('checked', this.checked)
      })
      $("#admins_permissions").click(function() {
        $(".adminscheckBox").prop('checked', this.checked)
      })
      $("#jobs_permissions").click(function() {
        $(".jobscheckBox").prop('checked', this.checked)
      })
      $("#job_history_permissions").click(function() {
        $(".jobHistorycheckBox").prop('checked', this.checked)
      })
      $("#credits_permissions").click(function() {
        $(".companyCreditscheckBox").prop('checked', this.checked)
      })
      $("#credits_history_permissions").click(function() {
        $(".companyCreditsHistorycheckBox").prop('checked', this.checked)
      })
      $("#payments_permissions").click(function() {
        $(".paymentTransactionscheckBox").prop('checked', this.checked)
      })
      $("#tickets_permissions").click(function() {
        $(".ticketscheckBox").prop('checked', this.checked)
      })
      $("#job_industries_permissions").click(function() {
        $(".jobIndustriescheckBox").prop('checked', this.checked)
      })
      $("#job_locations_permissions").click(function() {
        $(".jobLocationscheckBox").prop('checked', this.checked)
      })
      $("#skills_permissions").click(function() {
        $(".skillscheckBox").prop('checked', this.checked)
      })
      $("#cities_permissions").click(function() {
        $(".citiescheckBox").prop('checked', this.checked)
      })
      $("#counties_permissions").click(function() {
        $(".countiescheckBox").prop('checked', this.checked)
      })
      $("#restore_permissions").click(function() {
        $(".restorecheckBox").prop('checked', this.checked)
      })
      
      $('#addRoleForm').validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
          permissions:{
            required: true
          }
        },
        messages: {
          name: {
            required: "The Role Name field is required."
          },
          permissions: {
            required: "The Permission field is required.",
          }
        }
      });
    });
  </script>
@stop
