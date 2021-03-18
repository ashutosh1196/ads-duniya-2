@extends('adminlte::page')

@section('title', 'Role Permissions')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
            <h3>{{ __('adminlte::adminlte.role_permissions') }}</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addRoleForm" method="post", action="{{ route('save_permissions') }}">
              @csrf
              <div class="card-body">
                <div class="role-name">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="role_name">{{ __('adminlte::adminlte.role_name') }}</label>
                        <input type="hidden" name="role_id" id="role_id">
                        <select name="role_name" class="form-control" id="role_name">
                            <option value="" hidden>Select Role</option>
                          @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                        @if($errors->has('role_name'))
                          <div class="error">{{ $errors->first('role_name') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="role-permissions" id="role-permissions">
                  <label for="permissions[]" class="label">{{ __('adminlte::adminlte.permissions') }}</label>
                  <br>
                  <label id="permissions[]-error" class="error" for="permissions[]" style="font-weight: 400 !important;"></label>
                  <br><br> 
                  @if($errors->has('permissions'))
                    <div class="error">{{ $errors->first('permissions') }}</div>
                  @endif
                  <input type="checkbox" id="full_access" style="height: 15px;width: 50px;" class=""><strong>FULL ACCESS</strong><br><br>

                  <div class="title">
                    <h5>Customers Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Pending Customers</strong></p>
                        <input type="checkbox" id="pending_customer_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($pendingCustomersPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass pendingCustomerscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Whitelisted Customers</strong></p>
                        <input type="checkbox" id="whitelisted_customer_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($whitelistedCustomersPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass whitelistedCustomerscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Rejected Customers</strong></p>
                        <input type="checkbox" id="rejected_customer_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($rejectedCustomersPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass rejectedCustomerscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="title">
                    <h5>Users Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Recruiters</strong></p>
                        <input type="checkbox" id="recruiter_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($recruitersPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass recruiterscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Jobseekers</strong></p>
                        <input type="checkbox" id="jobseeker_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($jobseekersPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass jobseekerscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Admins</strong></p>
                        <input type="checkbox" id="admins_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($adminsPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass adminscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="title">
                    <h5>Jobs Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Jobs</strong></p>
                        <input type="checkbox" id="jobs_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($jobsPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass jobscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Job History</strong></p>
                        <input type="checkbox" id="job_history_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($jobHistoryPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass jobHistorycheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="title">
                    <h5>Credits Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Company Credits</strong></p>
                        <input type="checkbox" id="credits_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($companyCreditsPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass companyCreditscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Credits History</strong></p>
                        <input type="checkbox" id="credits_history_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($companyCreditsHistoryPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass companyCreditsHistorycheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Payment Transactions</strong></p>
                        <input type="checkbox" id="payments_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($paymentTransactionsPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass paymentTransactionscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="title">
                    <h5>Tickets Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-4">
                      <div class="form-group">
                        <input type="checkbox" id="tickets_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($ticketsPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass ticketscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="title">
                    <h5>Misc Data Management</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Job Industries</strong></p>
                        <input type="checkbox" id="job_industries_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($jobIndustriesPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass jobIndustriescheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Job Locations</strong></p>
                        <input type="checkbox" id="job_locations_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($jobLocationsPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass jobLocationscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Skills</strong></p>
                        <input type="checkbox" id="skills_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($skillsPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass skillscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Cities</strong></p>
                        <input type="checkbox" id="cities_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($citiesPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass citiescheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Counties</strong></p>
                        <input type="checkbox" id="counties_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($countiesPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass countiescheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>  
                  </div>

                  <div class="title">
                    <h5>Access Control</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Roles</strong></p>
                        <input type="checkbox" id="roles_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($rolesPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass rolescheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Permissions</strong></p>
                        <input type="checkbox" id="access_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($accessPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass accesscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="title">
                    <h5>Recycle Bin</h5>
                    <hr/>
                  </div>

                  <div class="row permissions-section">
                    <div class="col-4">
                      <div class="form-group">
                        <input type="checkbox" id="restore_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($restorePermissions as $permission)
                            <input type="checkbox" class="checkBoxClass restorecheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
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
    /* .role-permissions { display:none; } */
  </style>
@stop

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      checkAll();
      $("input[type='checkbox']").change(function() {
        checkAll();
      });
      $("#role_name").change(function() {
        $('input').filter(':checkbox').prop('checked',false);
        var role = $(this);
        $("#role_id").val(role.val());
        $(".checkBoxClass").removeAttr('checked');
        var id = $("#role_name").val();
        $.ajax({
          url: "{{ route('get_role_permissions') }}",
          type: 'post',
          data: {
            role_id: id
          },
          dataType: "JSON",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(res) {
            for (let i = 0; i < res.length; i++) {
              const response = res[i];
              var permissionId = "#button_"+response.permission_id;
              $(permissionId).prop('checked', 'true');
              checkAll();
            }
          }
        });
      });
      
      $('#addRoleForm').validate({
        ignore: [],
        debug: false,
        rules: {
          role_name: {
            required: true
          },
          "permissions[]":{
            required: true
          }
        },
        messages: {
          role_name: {
            required: "The Role Name field is required."
          },
          "permissions[]": {
            required: "You must select at least one permission.",
          }
        }
      });
    });
    
    function checkAll() {
      $("#full_access").click(function() {
        $("input[type=checkbox]").prop('checked', this.checked)
      })
      $("#pending_customer_permissions").click(function() {
        $(".pendingCustomerscheckBox").prop('checked', this.checked)
      })
      $("#whitelisted_customer_permissions").click(function() {
        $(".whitelistedCustomerscheckBox").prop('checked', this.checked)
      })
      $("#rejected_customer_permissions").click(function() {
        $(".rejectedCustomerscheckBox").prop('checked', this.checked)
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
      $("#roles_permissions").click(function() {
        $(".rolescheckBox").prop('checked', this.checked)
      })
      $("#access_permissions").click(function() {
        $(".accesscheckBox").prop('checked', this.checked)
      })
      $("#restore_permissions").click(function() {
        $(".restorecheckBox").prop('checked', this.checked)
      })

      if($('.checkBoxClass:checked').length == $('.checkBoxClass').length) {
        $("#full_access").prop('checked', 'true');
      }
      else {
        $("#full_access").prop('checked', false);
      }

      if($('.pendingCustomerscheckBox:checked').length == $('.pendingCustomerscheckBox').length) {
        $("#pending_customer_permissions").prop('checked', 'true');
      }
      else {
        $("#pending_customer_permissions").prop('checked', false);
      }
      if($('.whitelistedCustomerscheckBox:checked').length == $('.whitelistedCustomerscheckBox').length) {
        $("#whitelisted_customer_permissions").prop('checked', 'true');
      }
      else {
        $("#whitelisted_customer_permissions").prop('checked', false);
      }
      if($('.rejectedCustomerscheckBox:checked').length == $('.rejectedCustomerscheckBox').length) {
        $("#rejected_customer_permissions").prop('checked', 'true');
      }
      else {
        $("#rejected_customer_permissions").prop('checked', false);
      }
      if($('.recruiterscheckBox:checked').length == $('.recruiterscheckBox').length) {
        $("#recruiter_permissions").prop('checked', 'true');
      }
      else {
        $("#recruiter_permissions").prop('checked', false);
      }
      if($('.jobseekerscheckBox:checked').length == $('.jobseekerscheckBox').length) {
        $("#jobseeker_permissions").prop('checked', 'true');
      }
      else {
        $("#jobseeker_permissions").prop('checked', false);
      }
      if($('.adminscheckBox:checked').length == $('.adminscheckBox').length) {
        $("#admins_permissions").prop('checked', 'true');
      }
      else {
        $("#admins_permissions").prop('checked', false);
      }
      if($('.jobscheckBox:checked').length == $('.jobscheckBox').length) {
        $("#jobs_permissions").prop('checked', 'true');
      }
      else {
        $("#jobs_permissions").prop('checked', false);
      }
      if($('.jobHistorycheckBox:checked').length == $('.jobHistorycheckBox').length) {
        $("#job_history_permissions").prop('checked', 'true');
      }
      else {
        $("#job_history_permissions").prop('checked', false);
      }
      if($('.companyCreditscheckBox:checked').length == $('.companyCreditscheckBox').length) {
        $("#credits_permissions").prop('checked', 'true');
      }
      else {
        $("#credits_permissions").prop('checked', false);
      }
      if($('.companyCreditsHistorycheckBox:checked').length == $('.companyCreditsHistorycheckBox').length) {
        $("#credits_history_permissions").prop('checked', 'true');
      }
      else {
        $("#credits_history_permissions").prop('checked', false);
      }
      if($('.paymentTransactionscheckBox:checked').length == $('.paymentTransactionscheckBox').length) {
        $("#payments_permissions").prop('checked', 'true');
      }
      else {
        $("#payments_permissions").prop('checked', false);
      }
      if($('.ticketscheckBox:checked').length == $('.ticketscheckBox').length) {
        $("#tickets_permissions").prop('checked', 'true');
      }
      else {
        $("#tickets_permissions").prop('checked', false);
      }
      if($('.jobIndustriescheckBox:checked').length == $('.jobIndustriescheckBox').length) {
        $("#job_industries_permissions").prop('checked', 'true');
      }
      else {
        $("#job_industries_permissions").prop('checked', false);
      }
      if($('.jobLocationscheckBox:checked').length == $('.jobLocationscheckBox').length) {
        $("#job_locations_permissions").prop('checked', 'true');
      }
      else {
        $("#job_locations_permissions").prop('checked', false);
      }
      if($('.skillscheckBox:checked').length == $('.skillscheckBox').length) {
        $("#skills_permissions").prop('checked', 'true');
      }
      else {
        $("#skills_permissions").prop('checked', false);
      }
      if($('.citiescheckBox:checked').length == $('.citiescheckBox').length) {
        $("#cities_permissions").prop('checked', 'true');
      }
      else {
        $("#cities_permissions").prop('checked', false);
      }
      if($('.countiescheckBox:checked').length == $('.countiescheckBox').length) {
        $("#counties_permissions").prop('checked', 'true');
      }
      else {
        $("#counties_permissions").prop('checked', false);
      }
      if($('.rolescheckBox:checked').length == $('.rolescheckBox').length) {
        $("#roles_permissions").prop('checked', 'true');
      }
      else {
        $("#roles_permissions").prop('checked', false);
      }
      if($('.accesscheckBox:checked').length == $('.accesscheckBox').length) {
        $("#access_permissions").prop('checked', 'true');
      }
      else {
        $("#access_permissions").prop('checked', false);
      }
      if($('.restorecheckBox:checked').length == $('.restorecheckBox').length) {
        $("#restore_permissions").prop('checked', 'true');
      }
      else {
        $("#restore_permissions").prop('checked', false);
      }
    }
  </script>
@stop
