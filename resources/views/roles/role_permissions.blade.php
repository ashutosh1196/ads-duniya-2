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
                  <label for="permissions" class="label">{{ __('adminlte::adminlte.permissions') }}</label><br><br>
                  <input type="checkbox" id="full_access" style="height: 15px;width: 50px;" class=""><strong>FULL ACCESS</strong><br><br>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Customers</strong></p>
                        <input type="checkbox" id="customer_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($customersPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass customerscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
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
                  </div>
                  
                  <div class="row">
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
                  
                  <div class="row">
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
                        <p><strong class="list-text">Company Credits History</strong></p>
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
                  
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Tickets Credits</strong></p>
                        <input type="checkbox" id="tickets_permissions" style="height: 15px;width: 50px;" class="ckbCheckAll">
                        <strong class="list-text">Select All</strong>
                        <p id="checkBoxes">
                          @foreach($ticketsPermissions as $permission)
                            <input type="checkbox" class="checkBoxClass ticketscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}" style="height: 15px;width: 50px;"><span class="list-text">{{ $permission->name }}</span><br/>
                          @endforeach
                        </p>
                      </div>
                    </div>
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
                  </div>
                  
                  <div class="row">
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
                  
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <p><strong class="list-text">Restore Data</strong></p>
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
            }
          }
        });
      })
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
          role_name: {
            required: true
          },
          permissions:{
            required: true
          }
        },
        messages: {
          role_name: {
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
