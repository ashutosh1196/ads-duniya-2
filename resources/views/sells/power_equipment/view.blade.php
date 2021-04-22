@extends('adminlte::page')

@section('title', 'Power Equipment Information')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
         <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Equipment Information</h3>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">back</a>
        </div>       
        <div class="card-body">

          <form class="form_wrap">

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Title</label>
                  <input class="form-control" placeholder="{{ $equipment->title }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Description</label>
                  <input class="form-control" placeholder="{{ $equipment->description }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Make</label>
                  <input class="form-control" placeholder="{{ $equipment->make->brand_name_es}}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Model</label>
                  <input class="form-control" placeholder="{{ $equipment->model->model_name_es }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Manufacturing Date </label>
                  <input class="form-control" placeholder="{{ $equipment->manufacturing_date }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Selling Price </label>
                  <input class="form-control" placeholder="{{ $equipment->selling_price }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Color </label>
                  <input class="form-control" placeholder="{{ $equipment->exterior_color }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Output Frequency </label>
                  <input class="form-control" placeholder="{{ $equipment->output_frequency }}" readonly>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Equipment Images</label><br><br>
                  @foreach($equipment->images as $image)
                  <img src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$image->file}}" height="150" width="auto" />
                  @endforeach
                </div>
              </div>

              @if($equipment->video)
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label> Video</label><br><br>
                  <video id="video" width="300" height="300" src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$equipment->video->file}}" style="height:auto" controls class="form-control"></video>
                  
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



 


  