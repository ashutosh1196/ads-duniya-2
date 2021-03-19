@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
	<h1>Dashboard</h1>
@stop

@section('content')
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          @can('manage_whitelisted_customers')
            <div class="col-md-3 col-lg-3 col-xl-3 col-12">
              <div class="small-box customer">
                <div class="inner">
                  <div class="left">
                    <img src="{{ asset('') }}images/customer.svg" class="on-hover" alt="">
                    <img src="{{ asset('') }}images/people-2.svg" alt="">
                  </div>
                  <div class="right">
                    <p>{{ __('adminlte::adminlte.customers') }}</p>
                    <h3>{{ $customersCount }}</h3>
                  </div>
                </div>
                <a href="{{ route('whitelisted_customers') }}" class="small-box-footer">
                <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
                <img src="{{ asset('') }}images/next-2.svg" alt="">
                More Info</a>
              </div>
            </div>
          @endcan

          @can('manage_jobseekers')
            <div class="col-md-3 col-lg-3 col-xl-3 col-12">
              <div class="small-box jobseeker">
                <div class="inner">
                  <div class="left">
                    <img src="{{ asset('') }}images/jobseeker.svg" class="on-hover" alt="">
                    <img src="{{ asset('') }}images/jobseeker-2.svg" alt="">
                  </div>
                  <div class="right">
                    <p>{{ __('adminlte::adminlte.jobseekers') }}</p>
                    <h3>{{ $jobseekersCount }}</h3>
                  </div>
                </div>
                <a href="{{ route('jobseekers_list') }}" class="small-box-footer">
                <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
                <img src="{{ asset('') }}images/next-2.svg" alt="">
                More Info</a>
              </div>
            </div>
          @endcan

          @can('manage_recruiters')
            <div class="col-md-3 col-lg-3 col-xl-3 col-12">
              <div class="small-box">
                <div class="inner">
                  <div class="left">
                    <img src="{{ asset('') }}images/recruiter-3.svg" class="on-hover" alt="">
                    <img src="{{ asset('') }}images/recruiter-2.svg" alt="">
                  </div>
                  <div class="right">
                    <p>{{ __('adminlte::adminlte.recruiters') }}</p>
                    <h3>{{ $recruitersCount }}</h3>
                  </div>
                </div>
                <a href="{{ route('recruiters_list') }}" class="small-box-footer">
                <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
                <img src="{{ asset('') }}images/next-2.svg" alt="">
                More Info</a>
              </div>
            </div>
          @endcan

          @can('manage_admins')
            <div class="col-md-3 col-lg-3 col-xl-3 col-12">
              <div class="small-box admin">
                <div class="inner">
                  <div class="left">
                    <img src="{{ asset('') }}images/admin.svg" class="on-hover" alt="">
                    <img src="{{ asset('') }}images/user-2.svg" alt="">
                  </div>
                  <div class="right">
                    <p>{{ __('adminlte::adminlte.admins') }}</p>
                    <h3>{{ $adminsCount }}</h3>
                  </div>
                </div>
                <a href="{{ route('admins_list') }}" class="small-box-footer">
                <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
                <img src="{{ asset('') }}images/next-2.svg" alt="">
                More Info</a>
              </div>
            </div>
          @endcan

          @can('manage_job')
            <div class="col-md-3 col-lg-3 col-xl-3 col-6">
              <div class="small-box job-posted">
                <div class="inner">
                  <div class="left">
                    <img src="{{ asset('') }}images/job-posted.svg" class="on-hover" alt="">
                    <img src="{{ asset('') }}images/job-posted-2.svg" alt="">
                  </div>
                  <div class="right">
                    <p>{{ __('adminlte::adminlte.jobs') }}</p>
                    <h3>{{ isset($jobsCount) ? $jobsCount : 0 }}</h3>
                  </div>
                </div>
                <a href="{{ route('jobs_list') }}" class="small-box-footer">
                <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
                <img src="{{ asset('') }}images/next-2.svg" alt="">
                More Info</a>
              </div>
            </div>
          @endcan

            <!-- <div class="col-md-3 col-lg-3 col-xl-3 col-6">
              <div class="small-box job-applied">
                <div class="inner">
                  <div class="left">
                    <img src="{{ asset('') }}images/job-applied.svg" class="on-hover" alt="">
                    <img src="{{ asset('') }}images/job-applied-2.svg" alt="">
                  </div>
                  <div class="right">
                    <p>Job(s) Applied</p>
                    <h3>0</h3>
                  </div>
                </div>
                <a href="#" class="small-box-footer">
                <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
                <img src="{{ asset('') }}images/next-2.svg" alt="">
                More Info</a>
              </div>
            </div> -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
