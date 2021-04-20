@extends('adminlte::page')

@section('title', 'Add Car')

@section('content_header')
@stop

@section('content')

<section id="form_wraper">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Power Equipment Details</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">back<!-- {{ __('adminlte::adminlte.back') }} --></a>
          </div>
         
          
          <div class="card-body">
            <div class="form-group mt-4">
                  <h5>Primary Information</h5>
                </div>
                <hr>
            <!-- @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif -->

            <form id="makeVehicleForm" method="post" action="{{ route('save-make-vehicle') }}">
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
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="english">Title<!-- {{ __('adminlte::adminlte.name') }} --><span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="title" maxlength="100">
                        @error('title')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                        <!-- @if($errors->has('name'))
                          <div class="error">{{ $errors->first('name') }}</div>
                        @endif -->
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="english">Description<!-- {{ __('adminlte::adminlte.name') }} --><span class="text-danger">*</span></label>
                        <textarea  name="description" class="form-control" id="description">Description</textarea>
                        @error('description')
                        <div id ="car_error" class="error">{{ $message }}</div>
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
                      
                          <option value="">select</option>
                          <option value="0">suzuki</option>
                       
                        </select>
                        @error('make')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="model">Model<span class="text-danger"> *</span></label>
                        <select name="model" class="form-control" id="model">
                       
                          <option value="">select vehicle model</option>
                          <option value="0">bmw</option>
                      
                        </select>
                        @error('make')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="make">Manufacturing Date<span class="text-danger"> *</span></label>
                         <input type="date" name="manufacturing-date" class="form-control" id="manufacturing-date" maxlength="100">
                        @error('manufacturing-date')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label for="vin">Selling Price<span class="text-danger"> *</span></label>
                        <input type="text" name="vin" placeholder="vin"class="form-control" id="vin" maxlength="100">
                        @error('vin')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="vin">Color<span class="text-danger"> *</span></label>
                        <input type="text" name="vin" placeholder="Color"class="form-control" id="vin" maxlength="100">
                        @error('vin')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="vin">Output Frequency<span class="text-danger"> *</span></label>
                        <input type="text" name="vin"  class="form-control" id="vin" maxlength="100">
                        @error('vin')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>
                 
              </div>
              
              <!-- /.card-body -->

               <!-- </div>
                </div> -->
              
                <div class="form-group mt-4">
                  <h5>Vehicle Images</h5>
                </div>
                <hr>
             <div class="row upload_images">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Upload your images<span class="required">*</span></label>
                        <!-- <div class="alert alert-warning" role="alert">
                          Note: you can upload multiple images selecting one at a time.
                        </div>  -->  
                        <br><br>


                        <div class="alert alert-danger" role="alert" id="image_error" style="display:none">
                          You must select an image
                        </div> 

                      <div class="image_wrapper">
                        <button class="btn btn-info" type="button" id="choose_image"><i class="fa fa-plus"></i></button>
                        <input type="file" style="display:none" class="form-control col-md-6" id="files" name="files[]">
                        <input type="hidden" class="form-control" id="image_array" name="image_array">
                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Upload max 2MB file. Only jpg png jpeg gif files are allowed to upload">
                          <i class="fa fa-question-circle"></i>
                        </button>                        
                      </div>
                    
                    </div>
                  </div>

                </div>
                <div class="form-group">
                  <h5>Vehicle Video</h5>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-0">
                      <div class="upload_video_title">
                        <label>Upload video</label>
                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Upload max 3MB file. Only mp4 mov webm files are allowed to upload"><i class="fa fa-question-circle"></i>
                        </button> 
                      </div>

                      <div class="alert alert-danger" role="alert" id="video_error" style="display:none">
                        
                      </div>

                      <button class="btn btn-info" type="button" id="choose_video">Choose video file</button>

                      <input id="file-input" style="display:none" type="file" accept="video/*" class="form-control col-md-6" name="video">
                      <br>
                      <video id="video" style="display:none;" width="300" height="300" controls="" class="form-control"></video>

                    
                    </div>
                  </div>

                </div>
                <div class="or">
                  <label>OR</label>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Video url</label>
                      <input type="text" class="form-control" name="video_url" id="video_url" placeholder="Ex: http(s)://centrolmotors.com OR http(s)://www.centrolmotors.com">
                    
                    </div>
                  </div>

                </div>
               <div class="card-footer">
                <button type="text" class="btn btn-primary" >save<!-- {{ __('adminlte::adminlte.save') }} --></button>
              </div>
            </form>
            </div>
  </div>
      </div>
  </div>
</div>
</section>
@endsection

@section('css')
  <style>
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
  </style>
@stop
<!-- <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
 -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- @section('js') -->
  <script>
 
     $('#makeVehicleForm').validate({
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
             type: {
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
             type: {
                 required: "The Vehicle Brand is required."
             },      
         }
     });
 </script>

<!-- @stop -->
