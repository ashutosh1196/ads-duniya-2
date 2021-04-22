@extends('adminlte::page')

@section('title', 'Auto & Moto Part Information')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
         <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Auto & Moto Part Information</h3>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">back</a>
        </div>       
        <div class="card-body">
         

          <form class="form_wrap">

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Title</label>
                  <input class="form-control" placeholder="{{ $auto_and_moto_part->title }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Description</label>
                  <input class="form-control" placeholder="{{ $auto_and_moto_part->description }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Vehicle Type</label>
                  @if($auto_and_moto_part->vehicle_type==0)
                  <input class="form-control" placeholder="Car" readonly>
                  @elseif($auto_and_moto_part->vehicle_type==1)
                  <input class="form-control" placeholder="Moto" readonly>
                  @endif
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Make</label>
                  <input class="form-control" placeholder="{{ $auto_and_moto_part->make->brand_name_es}}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Model</label>
                  <input class="form-control" placeholder="{{ $auto_and_moto_part->model->model_name_es }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Manufacturing Date </label>
                  <input class="form-control" placeholder="{{ $auto_and_moto_part->manufacturing_date }}" readonly>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Model Year </label>
                  <input class="form-control" placeholder="{{ $auto_and_moto_part->vehicle_model_year }}" readonly>
                </div>
              </div>
             
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Selling Price </label>
                  <input class="form-control" placeholder="{{ $auto_and_moto_part->selling_price }}" readonly>
                </div>
              </div>
              
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Color</label>
                  <input class="form-control" placeholder="{{ $auto_and_moto_part->exterior_color }}" readonly>
                </div>
              </div>

              
            

            </div>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Vehicle Images</label><br><br>
                  @foreach($auto_and_moto_part->images as $image)
                  <img src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$image->file}}" height="150" width="auto" />
                  @endforeach
                </div>
              </div>

              @if($auto_and_moto_part->video)
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Vehicle Video</label><br><br>
                  <video id="video" width="300" height="300" src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$auto_and_moto_part->video->file}}" style="height:auto" controls class="form-control"></video>
                  
                </div>
              </div>
              @endif
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
    .industry-description { font-size: 13px; }
  </style>
@stop

@section('js')
@stop



 


  