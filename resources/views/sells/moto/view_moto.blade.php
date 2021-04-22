@extends('adminlte::page')

@section('title', 'Moto Information')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
         <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Vehicle Information</h3>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">back</a>
        </div>       
        <div class="card-body">
          <!-- @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif -->

          <form class="form_wrap">

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Title</label>
                  <input class="form-control" placeholder="{{ $carList->title }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Description</label>
                  <input class="form-control" placeholder="{{ $carList->description }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Make</label>
                  <input class="form-control" placeholder="{{ $carList->make->brand_name_es}}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Model</label>
                  <input class="form-control" placeholder="{{ $carList->model->model_name_es }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Manufacturing Date </label>
                  <input class="form-control" placeholder="{{ $carList->manufacturing_date }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Fuel Type</label>
                  @if($carList->fuel_type==0)
                  <input class="form-control" placeholder="Petrol" readonly>
                  @elseif($carList->fuel_type==1)
                  <input class="form-control" placeholder="Diesel" readonly>
                  @elseif($carList->fuel_type==2)
                  <input class="form-control" placeholder="Electric" readonly>
                  @endif
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Trim</label>
                  <input class="form-control" placeholder="{{ $carList->trim }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Transmission</label>
                  @if($carList->transmission==0)
                  <input class="form-control" placeholder="Automatic" readonly>
                  @elseif($carList->transmission==1)
                  <input class="form-control" placeholder="Manual" readonly>
                  @endif
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Vin</label>
                  <input class="form-control" placeholder="{{ $carList->vin }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Keyless ignition</label>
                  <input class="form-control" placeholder="{{ ($carList->keyless_ignition == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Navigation System</label>
                  <input class="form-control" placeholder="{{ ($carList->navigation_system == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Sports Bike Gas Tanks</label>
                  <input class="form-control" placeholder="{{ ($carList->sprorts_bike_gas_tank == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Leg Guards</label>
                  <input class="form-control" placeholder="{{ ($carList->leg_guards == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Motorbike Alarms</label>
                  <input class="form-control" placeholder="{{ ($carList->motorbike_alarm == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Sound System</label>
                  <input class="form-control" placeholder="{{ ($carList->sound_system == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Front Disc Brakes</label>
                  <input class="form-control" placeholder="{{ ($carList->front_disk_break == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Rear Disc Brakes</label>
                  <input class="form-control" placeholder="{{ ($carList->rear_disk_break == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Digital console</label>
                  <input class="form-control" placeholder="{{ ($carList->digital_console == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Power Locks</label>
                  <input class="form-control" placeholder="{{ ($carList->power_locks == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Smart Key</label>
                  <input class="form-control" placeholder="{{ ($carList->smart_keys == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              
             
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Alloy Wheels</label>
                  <input class="form-control" placeholder="{{ ($carList->alloy_wheels == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Tubeless Tyres</label>
                  <input class="form-control" placeholder="{{ ($carList->tubeless_tyres == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              
            
              @if($carList->satelite_radio_ready == 0)
                 @php $condition = 'Outstanding' @endphp
              @endif
              @if($carList->satelite_radio_ready == 1)
                 @php $condition = 'Clean' @endphp
              @endif
              @if($carList->satelite_radio_ready == 2)
                 @php $condition = 'Average' @endphp
              @endif
              @if($carList->satelite_radio_ready == 3)
                 @php $condition = 'Rough' @endphp
              @endif
              @if($carList->satelite_radio_ready == 4)
                 @php $condition = 'Damaged' @endphp
              @endif
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Condition</label>
                  <input class="form-control" placeholder="{{ $condition }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Has the vehicle ever been in an accident?*</label>
                  <input class="form-control" placeholder="{{ ($carList->vehicle_ever_been_in_accident == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Does the vehicle have any flood damage?*</label>
                  <input class="form-control" placeholder="{{ ($carList->vehicle_has_any_flood_damage == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Does the vehicle have any frame damage?*</label>
                  <input class="form-control" placeholder="{{ ($carList->vehicle_has_any_frame_damage == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Any mechanical or other issues?*</label>
                  <input class="form-control" placeholder="{{ ($carList->vehicle_has_any_mechanical_issues == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
             
            
              @if($carList->any_tyres_need_to_be_replaced == 0)
                 @php $paint = 'No' @endphp
              @endif
              @if($carList->any_tyres_need_to_be_replaced == 4)
                 @php $paint = 'More than 3' @endphp
              @endif
              @if($carList->any_tyres_need_to_be_replaced == 1 || $carList->any_tyres_need_to_be_replaced == 2 || $carList->any_tyres_need_to_be_replaced == 3)
                 @php $paint = $carList->any_tyres_need_to_be_replaced @endphp
              @endif
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Do any tires need to be replaced?*</label>
                  <input class="form-control" placeholder="{{ $paint }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Does the vehicle have any aftermarket modifications?*</label>
                  <input class="form-control" placeholder="{{ ($carList->vehicle_has_any_aftermarket_modification == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              
              @if($carList->how_many_vehicle_keys == 0)
                 @php $key = '1' @endphp
              @endif
              @if($carList->how_many_vehicle_keys == 1)
                 @php $key = '2 or More' @endphp
              @endif
              @if($carList->how_many_vehicle_keys == '')
                @php $key = 'No' @endphp
              @endif
             
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>How many keys do you have?*</label>
                  <input class="form-control" placeholder="{{ $key }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Model Year </label>
                  <input class="form-control" placeholder="{{ $carList->vehicle_model_year }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Mileage</label>
                  <input class="form-control" placeholder="{{ $carList->mileage }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Selling Price </label>
                  <input class="form-control" placeholder="{{ $carList->selling_price }}" readonly>
                </div>
              </div>
              
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Color</label>
                  <input class="form-control" placeholder="{{ $carList->exterior_color }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Mpg highway</label>
                  <input class="form-control" placeholder="{{ $carList->mpg_highway }}" readonly>
                </div>
              </div>
            

            </div>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Vehicle Images</label><br><br>
                  @foreach($carList->images as $image)
                  <img src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$image->file}}" height="150" width="auto" />
                  @endforeach
                </div>
              </div>

              @if($carList->video)
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Vehicle Video</label><br><br>
                  <video id="video" width="300" height="300" src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$carList->video->file}}" style="height:auto" controls class="form-control"></video>
                  
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



 


  