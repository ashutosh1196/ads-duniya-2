@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
	<h1>Dashboard</h1>
@stop

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

        <div class="col-md-3 col-lg-3 col-xl-3 col-12">
          <div class="small-box customer">
            <div class="inner">
              <div class="left">
                <img src="https://img.icons8.com/office/80/null/merchant-account.png"/>
              </div>
              <div class="right">
                <p>Banks</p>
                <h3>{{$bank_counts}}</h3>
              </div>
            </div>
            <a href="{{route('banks')}}" class="small-box-footer">
            <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
            <img src="{{ asset('') }}images/next-2.svg" alt="">
            More Info</a>
          </div>
        </div>

        <div class="col-md-3 col-lg-3 col-xl-3 col-12">
          <div class="small-box customer">
            <div class="inner">
              <div class="left">
                <img src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/null/external-savings-banking-flaticons-flat-flat-icons.png"/>
              </div>
              <div class="right">
                <p>Saving Accounts</p>
                <h3>{{$saving_account_counts}}</h3>
              </div>
            </div>
            <a href="{{route('saving-accounts')}}" class="small-box-footer">
            <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
            <img src="{{ asset('') }}images/next-2.svg" alt="">
            More Info</a>
          </div>
        </div>

        <div class="col-md-3 col-lg-3 col-xl-3 col-12">
          <div class="small-box customer">
            <div class="inner">
              <div class="left">
                <img src="https://img.icons8.com/external-smashingstocks-flat-smashing-stocks/66/null/external-Loan-online-payments-smashingstocks-flat-smashing-stocks.png"/>
              </div>
              <div class="right">
                <p>Loans</p>
                <h3>{{$loan_info_counts}}</h3>
              </div>
            </div>
            <a href="{{route('loans')}}" class="small-box-footer">
            <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
            <img src="{{ asset('') }}images/next-2.svg" alt="">
            More Info</a>
          </div>
        </div>

        <div class="col-md-3 col-lg-3 col-xl-3 col-12">
          <div class="small-box customer">
            <div class="inner">
              <div class="left">
                <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/null/external-credit-card-travel-agency-flaticons-lineal-color-flat-icons.png"/>
              </div>
              <div class="right">
                <p>Credit Card</p>
                <h3>{{$credit_card_counts}}</h3>
              </div>
            </div>
            <a href="{{route('credit-cards')}}" class="small-box-footer">
            <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
            <img src="{{ asset('') }}images/next-2.svg" alt="">
            More Info</a>
          </div>
        </div>

        <div class="col-md-3 col-lg-3 col-xl-3 col-12">
          <div class="small-box customer">
            <div class="inner">
              <div class="left">
                <img src="https://img.icons8.com/external-tone-royyan-wijaya/64/null/external-acountant-banking-illustration-tone-royyan-wijaya-17.png"/>
              </div>
              <div class="right">
                <p>Demat Accounts</p>
                <h3>{{$demats_count}}</h3>
              </div>
            </div>
            <a href="{{route('demats')}}" class="small-box-footer">
            <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
            <img src="{{ asset('') }}images/next-2.svg" alt="">
            More Info</a>
          </div>
        </div>

        <div class="col-md-3 col-lg-3 col-xl-3 col-12">
          <div class="small-box customer">
            <div class="inner">
              <div class="left">
                <img src="https://img.icons8.com/arcade/64/null/money-bag.png"/>
              </div>
              <div class="right">
                <p>Mutual Funds</p>
                <h3>{{$mutual_funds_count}}</h3>
              </div>
            </div>
            <a href="{{route('mutual-funds')}}" class="small-box-footer">
            <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
            <img src="{{ asset('') }}images/next-2.svg" alt="">
            More Info</a>
          </div>
        </div>

        <div class="col-md-3 col-lg-3 col-xl-3 col-12">
          <div class="small-box customer">
            <div class="inner">
              <div class="left">
                <img src="https://img.icons8.com/nolan/96/google-blog-search.png"/>
              </div>
              <div class="right">
                <p>Blogs</p>
                <h3>{{$blogs_count}}</h3>
              </div>
            </div>
            <a href="{{route('blogs')}}" class="small-box-footer">
            <img src="{{ asset('') }}images/next.svg" class="on-hover" alt="">
            <img src="{{ asset('') }}images/next-2.svg" alt="">
            More Info</a>
          </div>
        </div>

    </div> 
  </div>
</section>
<!-- /.content -->
@endsection
