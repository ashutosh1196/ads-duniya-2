@extends('adminlte::page')

@section('title', 'Add Model')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3><!-- {{ __('adminlte::adminlte.add_job_industry') }} --></h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">back<!-- {{ __('adminlte::adminlte.back') }} --></a>
          </div>
          <div class="card-body">
            <!-- @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif -->
            <form id="modelVehicleForm" method="post" action="{{ route('save-model-vehicle') }}">
              @csrf
              <div class="card-body">
                <!-- @if ($errors->any())
                  <div class="alert alert-warning">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif -->

                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="english">English<!-- {{ __('adminlte::adminlte.name') }} --><span class="text-danger">*</span></label>
                        <input type="text" name="english" class="form-control" id="english" maxlength="100">
                        @error('english')
                        <div id ="model_error" class="error">{{ $message }}</div>
                        @enderror
                        <!-- @if($errors->has('name'))
                          <div class="error">{{ $errors->first('name') }}</div>
                        @endif -->
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="english"> 
                           Haitian Creole<!-- {{ __('adminlte::adminlte.name') }} --><span class="text-danger">*</span></label>
                        <input type="text" name="haitian" class="form-control" id="haitian" maxlength="100">
                        @error('haitian')
                        <div id ="model_error" class="error">{{ $message }}</div>
                        @enderror
                        <!-- @if($errors->has('name'))
                          <div class="error">{{ $errors->first('name') }}</div>
                        @endif -->
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="english">French<!-- {{ __('adminlte::adminlte.name') }} --><span class="text-danger">*</span></label>
                        <input type="text" name="french" class="form-control" id="french" maxlength="100">
                        @error('french')
                        <div id ="model_error" class="error">{{ $message }}</div>
                        @enderror
                        <!-- @if($errors->has('name'))
                          <div class="error">{{ $errors->first('name') }}</div>
                        @endif -->
                      </div>
                    </div>
                    
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label for="english">Spanish<!-- {{ __('adminlte::adminlte.name') }} --><span class="text-danger">*</span></label>
                        <input type="text" name="estonia" class="form-control" id="estonia" maxlength="100">
                        @error('estonia')
                        <div id ="model_error" class="error">{{ $message }}</div>
                        @enderror
                        <!-- @if($errors->has('name'))
                          <div class="error">{{ $errors->first('name') }}</div>
                        @endif -->
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="make">Make<span class="text-danger"> *</span></label>
                        <select name="make" class="form-control" id="make">
                        @foreach($make as $data)
                          <option value="{{$data->id}}">{{$data->brand_name_en}}</option>
                        @endforeach
                        </select>
                        @error('make')
                        <div id ="model_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary" >save<!-- {{ __('adminlte::adminlte.save') }} --></button>
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
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
  </style>
@stop
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- @section('js') -->
  <script>
 
     $('#modelVehicleForm').validate({
         rules: {
             english: {
                 required: true
             },
             haitian: {
                 required: true
             },
             french: {
                 required: true
             },
             estonia: {
                 required: true
             },
                   
         },
         messages: {
             english: {
                 required: "The English Language is required."
             },            
             haitian: {
                 required: "The Haitian Language is required."
             },
             french: {
                 required: "The French Language is required."
             },        
             estonia: {
                 required: "The Estonia Language is required."
             },
                   
         }
     });
 </script>
<!-- @stop -->
