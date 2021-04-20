@extends('adminlte::page')

@section('title', 'Make Information')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
         <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Make Information</h3>
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
                  <input class="form-control" placeholder="{{ $carList[0]->title }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Description</label>
                  <input class="form-control" placeholder="{{ $carList[0]->description }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Make</label>
                  <input class="form-control" placeholder="{{ $carList[0]->make->brand_name_es}}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Model</label>
                  <input class="form-control" placeholder="{{ $carList[0]->model->model_name_es }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Manufacturing Date </label>
                  <input class="form-control" placeholder="{{ $carList[0]->manufacturing_date }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Fuel Type</label>
                  <input class="form-control" placeholder="{{ $carList[0]->fuel_type }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Trim</label>
                  <input class="form-control" placeholder="{{ $carList[0]->trim }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Drive</label>
                  <input class="form-control" placeholder="{{ $carList[0]->drives }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Transmission</label>
                  <input class="form-control" placeholder="{{ $carList[0]->transmission }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Vin</label>
                  <input class="form-control" placeholder="{{ $carList[0]->vin }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Bluetooth Technology</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->bluetooth_technology == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Navigation System</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->navigation_system == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Full Roof Rack</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->full_roof_rack == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Running Boards</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->running_boards == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Tow Hitch</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->tow_hitch == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>ABS Brakes</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->abs_brakes == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Air Conditioning</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->ac == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Cruise Control</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->cruise_control == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Front Seat Heaters</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->front_seat_heaters == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Leather Seats</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->leather_seats == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Overhead Airbags</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->overhead_airbags == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Power Locks</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->power_locks == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Power Mirrors</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->power_mirrors == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Power Seats</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->power_seats == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Power Windows</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->power_windows == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Rear Defroster</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->rear_defroster == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Rear View Camera</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->rear_view_camera == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Side Airbags</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->side_airbags == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Smart Key</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->smart_keys == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Sunroofs</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->sunroof == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Traction Control</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->tractional_control == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Alloy Wheels</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->alloy_wheels == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Tubeless Tyres</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->tubeless_tyres == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>AM/FM Stereo</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->am_fm_stereo == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Auxiliary Audio Input</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->auxilary_audio_input == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>CD Audio</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->cd_audio == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Satellite Radio Ready</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->satelite_radio_ready == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              @if($carList[0]->satelite_radio_ready == 0)
                 @php $condition = 'Outstanding' @endphp
              @endif
              @if($carList[0]->satelite_radio_ready == 1)
                 @php $condition = 'Clean' @endphp
              @endif
              @if($carList[0]->satelite_radio_ready == 2)
                 @php $condition = 'Average' @endphp
              @endif
              @if($carList[0]->satelite_radio_ready == 3)
                 @php $condition = 'Rough' @endphp
              @endif
              @if($carList[0]->satelite_radio_ready == 4)
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
                  <input class="form-control" placeholder="{{ ($carList[0]->vehicle_ever_been_in_accident == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Does the vehicle have any flood damage?*</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->vehicle_has_any_flood_damage == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Does the vehicle have any frame damage?*</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->vehicle_has_any_frame_damage == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Any mechanical or other issues?*</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->vehicle_has_any_mechanical_issues == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Are any warning lights currently visible?*</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->any_warning_lights_currently_visible == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              @if($carList[0]->any_panel_in_need_of_paint_or_body_work == 0)
                 @php $paint = 'No' @endphp
              @endif
              @if($carList[0]->any_panel_in_need_of_paint_or_body_work == 4)
                 @php $paint = 'More' @endphp
              @endif
              @if($carList[0]->any_panel_in_need_of_paint_or_body_work == 1 || $carList[0]->any_panel_in_need_of_paint_or_body_work == 2 || $carList[0]->any_panel_in_need_of_paint_or_body_work == 3)
                 @php $paint = $carList[0]->any_panel_in_need_of_paint_or_body_work @endphp
              @endif
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Are there any panels in need of paint or body work?*</label>
                  <input class="form-control" placeholder="{{ $paint }}" readonly>
                </div>
              </div>
              @if($carList[0]->any_interior_parts_broken_or_inoperable == 0)
                 @php $paint = 'No' @endphp
              @endif
              @if($carList[0]->any_interior_parts_broken_or_inoperable == 4)
                 @php $paint = 'More' @endphp
              @endif
              @if($carList[0]->any_interior_parts_broken_or_inoperable == 1 || $carList[0]->any_interior_parts_broken_or_inoperable == 2 || $carList[0]->any_interior_parts_broken_or_inoperable == 3)
                 @php $paint = $carList[0]->any_interior_parts_broken_or_inoperable @endphp
              @endif
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Are any interior parts broken or inoperable?*</label>
                  <input class="form-control" placeholder="{{ $paint }}" readonly>
                </div>
              </div>
              @if($carList[0]->any_rips_tears_or_strains_in_interior == 0)
                 @php $paint = 'No' @endphp
              @endif
              @if($carList[0]->any_rips_tears_or_strains_in_interior == 4)
                 @php $paint = 'More' @endphp
              @endif
              @if($carList[0]->any_rips_tears_or_strains_in_interior == 1 || $carList[0]->any_rips_tears_or_strains_in_interior == 2 || $carList[0]->any_rips_tears_or_strains_in_interior == 3)
                 @php $paint = $carList[0]->any_rips_tears_or_strains_in_interior @endphp
              @endif
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Are there any rips, tears, or stains in the interior?*</label>
                  <input class="form-control" placeholder="{{ $paint }}" readonly>
                </div>
              </div>
              @if($carList[0]->any_tyres_need_to_be_replaced == 0)
                 @php $paint = 'No' @endphp
              @endif
              @if($carList[0]->any_tyres_need_to_be_replaced == 4)
                 @php $paint = 'More' @endphp
              @endif
              @if($carList[0]->any_tyres_need_to_be_replaced == 1 || $carList[0]->any_tyres_need_to_be_replaced == 2 || $carList[0]->any_tyres_need_to_be_replaced == 3)
                 @php $paint = $carList[0]->any_tyres_need_to_be_replaced @endphp
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
                  <input class="form-control" placeholder="{{ ($carList[0]->vehicle_has_any_aftermarket_modification == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Has the odometer ever been broken or replaced?*</label>
                  <input class="form-control" placeholder="{{ ($carList[0]->vehicle_has_any_aftermarket_modification == 1)? 'Yes':'No' }}" readonly>
                </div>
              </div>
              @if($carList[0]->how_many_vehicle_keys == 0)
                 @php $key = '1' @endphp
              @endif
              @if($carList[0]->how_many_vehicle_keys == 1)
                 @php $key = '2 or More' @endphp
              @endif
              @if($carList[0]->how_many_vehicle_keys == '')
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
                  <input class="form-control" placeholder="{{ $carList[0]->vehicle_model_year }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Mileage</label>
                  <input class="form-control" placeholder="{{ $carList[0]->mileage }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Selling Price </label>
                  <input class="form-control" placeholder="{{ $carList[0]->selling_price }}" readonly>
                </div>
              </div>
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Exterior color</label>
                  <input class="form-control" placeholder="{{ $carList[0]->exterior_color }}" readonly>
                </div>
              </div>
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Interior color</label>
                  <input class="form-control" placeholder="{{ $carList[0]->interior_color }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Mpg highway</label>
                  <input class="form-control" placeholder="{{ $carList[0]->mpg_highway }}" readonly>
                </div>
              </div>
               @php 

                    $img = isset($carList[0]->getFile->file)?$carList[0]->getFile->file:'';

              @endphp
               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Vehicle Image</label>
                  <img src="{{asset('storage/inventory_files').'/'.$img}}" height="100px" width="100px" />
                </div>
              </div>

             <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="{{ $carList[0]->created_at ? date('d/m/y', strtotime($carList[0]->created_at)) : '' }}" readonly>
                </div>
             </div>

            </div>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>Last Updated Date</label>
                  <input class="form-control" placeholder="{{ $carList[0]->updated_at ? date('d/m/y', strtotime($carList[0]->updated_at)) : '' }}" readonly>
                </div>
              </div>
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



 


  