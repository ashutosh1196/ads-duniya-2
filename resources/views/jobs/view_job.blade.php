@extends('adminlte::page')

@section('title', 'Job Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>{{ __('adminlte::adminlte.job_information') }}</h1>
    <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
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
          <div class="card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="fas fa-fw fa-cogs "></i>Job Detail</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><i class="fas fa-user-circle"></i>Jobseekers applied for this job</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <form>
                      <div class="row">
                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.job_title') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->job_title ? $jobDetails->job_title : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.is_featured') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->is_featured ? 'Yes' : 'No' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.job_type') }}</label>
                          <?php $jobTypeTrimmed = str_replace('_', ' ', $jobDetails->job_type);
                            $jobType = ucwords($jobTypeTrimmed);
                          ?>
                          <input class="form-control" placeholder="{{ $jobDetails->job_type ? $jobType : '--' }}" readonly>
                        </div>
                      </div>
                    
                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.reference_number') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->job_ref_number ? $jobDetails->job_ref_number : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.job_industry') }}</label>
                          <input class="form-control" placeholder="{{ $jobIndustry ? $jobIndustry : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.job_function') }}</label>
                          <input class="form-control" placeholder="{{ $jobFunction ? $jobFunction : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.salary') }} (Per Annum)</label>
                          <?php $currency = $jobDetails->salary_currency == 'pounds' ? '$' : '£' ?>
                          <input class="form-control" placeholder="{{ $currency }}{{ $jobDetails->min_monthly_salary ? $jobDetails->min_monthly_salary.' - '.$currency.$jobDetails->max_monthly_salary : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.experience_required') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->min_experience ? $jobDetails->min_experience.' - '.$jobDetails->max_experience.' Years' : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.status') }}</label>
                          <?php $statusTrimmed = str_replace('_', ' ', $jobDetails->status);
                            $status = ucwords($statusTrimmed);
                          ?>
                          <input class="form-control" placeholder="{{ $jobDetails->status ? $status : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.company_name') }}</label>
                          <input class="form-control" placeholder="{{ $organizationName }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.recruiter_name') }}</label>
                          @if($recruiter != null)
                            <!-- <a class="recruiter-view-link" href="{{ route('view_recruiter', [ 'id' => $recruiter->id ]) }}"> --><input class="form-control" placeholder="{{ $recruiter->first_name ? $recruiter->first_name.' '.$recruiter->last_name : $recruiter->email }}" disabled><!-- </a> -->
                          @else
                            <input class="form-control" readonly>
                          @endif
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.location') }}</label>
                          <input class="form-control" placeholder="{{ $jobLocation ? $jobLocation : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.address') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->job_address ? $jobDetails->job_address : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.city') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->city ? $jobDetails->city : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.county') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->county ? $jobDetails->county : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.state') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->state ? $jobDetails->state : '--' }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.country') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->country ? $jobDetails->country : '--' }}" readonly>
                        </div>
                      </div>
                      
                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.zip') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->pincode ? $jobDetails->pincode : '--' }}" readonly>
                        </div>
                      </div>
                      
                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.created_by') }}</label>
                          <input class="form-control" placeholder="{{ $jobDetails->created_by ? $jobDetails->created_by : '--' }}" readonly>
                        </div>
                      </div>
                      
                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.created_date') }}</label>
                          <input class="form-control" placeholder="{{ date('d/m/Y - H:i A', strtotime($jobDetails->created_at)) }}" readonly>
                        </div>
                      </div>
                    
                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                        <div class="form-group">
                          <label>{{ __('adminlte::adminlte.last_updated_date') }}</label>
                          <input class="form-control" placeholder="{{ date('d/m/Y - H:i A', strtotime($jobDetails->updated_at)) }}" readonly>
                        </div>
                      </div>

                      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                        <div class="form-group description">
                          <label>{{ __('adminlte::adminlte.job_description') }}</label><br/>
                          <div class="job-description">{!! $jobDetails->job_description !!}</div>
                        </div>
                      </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <table id="applicators-list" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>{{ __('adminlte::adminlte.name') }}</th>
                        <th>{{ __('adminlte::adminlte.email') }}</th>
                        <th>{{ __('adminlte::adminlte.contact_number') }}</th>
                        <th>{{ __('adminlte::adminlte.actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Test Jobseeker</td>
                        <td>test_jobseeker@mailinator.com</td>
                        <td>+449785758697</td>
                        <td>
                          <a class="action-button" title="View" href="javascript:void(0)"><i class="text-info fa fa-eye"></i></a>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>{{ __('adminlte::adminlte.name') }}</th>
                        <th>{{ __('adminlte::adminlte.email') }}</th>
                        <th>{{ __('adminlte::adminlte.contact_number') }}</th>
                        <th>{{ __('adminlte::adminlte.actions') }}</th>
                      </tr>
                    </tfoot>
                  </table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>

          <!-- <form class="form_wrap">
            <div class="row">

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_title') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->job_title ? $jobDetails->job_title : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.is_featured') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->is_featured ? 'Yes' : 'No' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_type') }}</label>
                  <?php $jobTypeTrimmed = str_replace('_', ' ', $jobDetails->job_type);
                    $jobType = ucwords($jobTypeTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $jobDetails->job_type ? $jobType : '--' }}" readonly>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.reference_number') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->job_ref_number ? $jobDetails->job_ref_number : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_industry') }}</label>
                  <input class="form-control" placeholder="{{ $jobIndustry ? $jobIndustry : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_function') }}</label>
                  <input class="form-control" placeholder="{{ $jobFunction ? $jobFunction : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.salary') }} (Per Annum)</label>
                  <?php $currency = $jobDetails->salary_currency == 'pounds' ? '$' : '£' ?>
                  <input class="form-control" placeholder="{{ $currency }}{{ $jobDetails->min_monthly_salary ? $jobDetails->min_monthly_salary.' - '.$currency.$jobDetails->max_monthly_salary : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.experience_required') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->min_experience ? $jobDetails->min_experience.' - '.$jobDetails->max_experience.' Years' : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.status') }}</label>
                  <?php $statusTrimmed = str_replace('_', ' ', $jobDetails->status);
                    $status = ucwords($statusTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $jobDetails->status ? $status : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.company_name') }}</label>
                  <input class="form-control" placeholder="{{ $organizationName }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.recruiter_name') }}</label>
                  @if($recruiter != null)
                    <a class="recruiter-view-link" href="{{ route('view_recruiter', [ 'id' => $recruiter->id ]) }}"><input class="form-control" placeholder="{{ $recruiter->first_name ? $recruiter->first_name.' '.$recruiter->last_name : $recruiter->email }}" disabled></a>
                  @else
                    <input class="form-control" readonly>
                  @endif
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.location') }}</label>
                  <input class="form-control" placeholder="{{ $jobLocation ? $jobLocation : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.address') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->job_address ? $jobDetails->job_address : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.city') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->city ? $jobDetails->city : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.county') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->county ? $jobDetails->county : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.state') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->state ? $jobDetails->state : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.country') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->country ? $jobDetails->country : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.zip') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->pincode ? $jobDetails->pincode : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_by') }}</label>
                  <input class="form-control" placeholder="{{ $jobDetails->created_by ? $jobDetails->created_by : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_date') }}</label>
                  <input class="form-control" placeholder="{{ date('d/m/Y - H:i A', strtotime($jobDetails->created_at)) }}" readonly>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.last_updated_date') }}</label>
                  <input class="form-control" placeholder="{{ date('d/m/Y - H:i A', strtotime($jobDetails->updated_at)) }}" readonly>
                </div>
              </div>

              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group description">
                  <label>{{ __('adminlte::adminlte.job_description') }}</label><br/>
                  <div class="job-description">{!! $jobDetails->job_description !!}</div>
                </div>
              </div>
            </div>

            </div>
          </form> -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/jquery/css/intlTelInput//demo.css">
  <style>
    .job-description { font-size: 13px; }
  </style>
@stop

@section('js')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#applicators-list').DataTable( {
        columnDefs: [ {
          targets: 0,
          render: function ( data, type, row ) {
            return data.substr( 0, 2 );
          }
        }]
      });
    });
  </script>
@stop
