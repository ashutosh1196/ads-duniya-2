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

          <div class="col-md-3 col-lg-3 col-xl-3 col-12">
            <div class="small-box customer">
              <div class="inner">
                 <div class="left">
                   <img src="{{ asset('') }}images/customer.svg" class="on-hover" alt="">
                   <img src="{{ asset('') }}images/people-2.svg" alt="">
                 </div>
                 <div class="right">
                   <p>Customer(s)</p>
                   <h3>{{ $customersCount }}</h3>
                 </div>
              </div>
              <a href="{{ route('whitelisted_customers') }}" class="small-box-footer">
              <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
              <img src="{{ asset('') }}images/next-2.svg" alt="">
              More Info</a>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 col-xl-3 col-12">
            <div class="small-box jobseeker">
              <div class="inner">
                <div class="left">
                  <img src="{{ asset('') }}images/jobseeker.svg" class="on-hover" alt="">
                  <img src="{{ asset('') }}images/jobseeker-2.svg" alt="">
                </div>
                <div class="right">
                  <p>Jobseeker(s)</p>
                  <h3>{{ $jobseekersCount }}</h3>
                </div>
              </div>
              <a href="{{ route('jobseekers_list') }}" class="small-box-footer">
              <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
              <img src="{{ asset('') }}images/next-2.svg" alt="">
              More Info</a>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 col-xl-3 col-12">
            <div class="small-box">
              <div class="inner">
                <div class="left">
                  <img src="{{ asset('') }}images/recruiter-3.svg" class="on-hover" alt="">
                  <img src="{{ asset('') }}images/recruiter-2.svg" alt="">
                </div>
                <div class="right">
                  <p>Recruiter(s)</p>
                  <h3>{{ $recruitersCount }}</h3>
                </div>
              </div>
              <a href="{{ route('recruiters_list') }}" class="small-box-footer">
              <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
              <img src="{{ asset('') }}images/next-2.svg" alt="">
              More Info</a>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 col-xl-3 col-12">
            <div class="small-box admin">
              <div class="inner">
                <div class="left">
                  <img src="{{ asset('') }}images/admin.svg" class="on-hover" alt="">
                  <img src="{{ asset('') }}images/user-2.svg" alt="">
                </div>
                <div class="right">
                  <p>Admin(s)</p>
                  <h3>{{ $adminsCount }}</h3>
                </div>
              </div>
              <a href="{{ route('admins_list') }}" class="small-box-footer">
              <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
              <img src="{{ asset('') }}images/next-2.svg" alt="">
              More Info</a>
            </div>
          </div>

          <!-- <div class="col-md-3 col-lg-3 col-xl-3 col-6">
            <div class="small-box job-posted">
              <div class="inner">
                <div class="left">
                  <img src="{{ asset('') }}images/job-posted.svg" class="on-hover" alt="">
                  <img src="{{ asset('') }}images/job-posted-2.svg" alt="">
                </div>
                <div class="right">
                  <p>Job(s) Posted</p>
                  <h3>{{ isset($jobsCount) ? $$jobsCount : 0 }}</h3>
                </div>
              </div>
              <a href="#" class="small-box-footer">
              <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
              <img src="{{ asset('') }}images/next-2.svg" alt="">
              More Info</a>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 col-xl-3 col-6">
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
