@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
  <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">Back</a>
  <h1>Settings</h1>
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          {{ __('Profile') }
        }</div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <b>Name :</b> {{ $userDetails[0]->name }}<br/>
          <b>Email :</b> {{ $userDetails[0]->email }}<br/>
          <b>Email Verify Status :</b> True<br/>
          <b>Status :</b> True<br/>
        </div>
      </div>
      <div class="card">
        <div class="card-header">{{ __('Change Password') }}</div>
        <div class="card-body">
          {{ __('Change Password Fields Here!') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script> console.log('Hi!'); </script>
@stop
