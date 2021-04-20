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
            <h3>Car Details</h3>
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

            <form id="add_car_details_form" method="post" action="{{ route('save-car') }}" enctype="multipart/form-data">
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
                        <textarea  name="description" class="form-control" id="description" placeholder="description"></textarea>
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
                        <label for="vehicle_make">Make<span class="text-danger"> *</span></label>
                        <select name="vehicle_make" class="form-control" id="vehicle_make">
                         <option value="" disabled="" selected>Select</option>
                         @foreach($make as $data)
                          <option value="{{$data->id}}">{{$data->brand_name_en}}</option>
                        @endforeach
                        </select>
                        @error('vehicle_make')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="vehicle_model">Model<span class="text-danger"> *</span></label>
                        <select name="vehicle_model" class="form-control" id="vehicle_model">
                       <option value="" disabled="" selected>Select vehicle Model</option>
                        </select>
                        @error('vehicle_model')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="make">Manufacturing Date<span class="text-danger"> *</span></label>
                         <input type="date" name="manufacturing_date" class="form-control" id="manufacturing_date" placeholder="DD/MM/YYYY">
                        @error('manufacturing_date')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="fuel_type">Fuel Type<span class="text-danger"> *</span></label>
                        <select name="fuel_type" class="form-control" id="fuel_type">
                        <option value="" disabled="" selected>Select</option>
                        @foreach($fuel_types as $fuel_type)
                          <option value="{{$fuel_type->value}}">{{$fuel_type->name_en}}</option>
                       @endforeach
                        </select>
                        @error('fuel_type')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="trim">Trim<span class="text-danger"> *</span></label>
                        <input type="text" name="trim" class="form-control" id="trim" maxlength="100">
                        @error('trim')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="drives">Drive<span class="text-danger"> *</span></label>
                        <input type="text" name="drives" class="form-control" id="drives" maxlength="100">
                        @error('drives')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="transmission">Transmission<span class="text-danger"> *</span></label>
                        <select name="transmission" class="form-control" id="transmission">
                         <option value="" disabled="" selected>Select</option>
                        @foreach($transmissions as $transmission)
                          <option value="{{$transmission->value}}">{{$transmission->name_en}}</option>
                       @endforeach
                        </select>
                        @error('transmission')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="vin">Vin<span class="text-danger"> *</span></label>
                        <input type="text" name="vin" placeholder="vin"class="form-control" id="vin" maxlength="100">
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
                  <h5>Extra Features</h5>
                </div>
                <hr>
             <div class="row checkbox_wrap">

                 <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" id="check_all" name="check_all" class="form-control check_all">
                          <span></span>
                      </div>
                      <label class="select_all">Select All</label>
                    </div>
                  </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="bluetooth_technology" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Bluetooth Technology</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="navigation_system" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Navigation System</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="full_roof_rack" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Full Roof Rack</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="running_boards" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Running Boards</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="tow_hitch" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Tow Hitch</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="abs_brakes" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>ABS Brakes</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="ac" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Air Conditioning</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="cruise_control" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Cruise Control</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="front_seat_heaters" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Front Seat Heaters</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="leather_seats" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Leather Seats</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="overhead_airbags" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Overhead Airbags</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="power_locks" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Power Locks</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="power_mirrors" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Power Mirrors</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="power_seats" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Power Seat(s)</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="power_windows" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Power Windows</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="rear_defroster" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Rear Defroster</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="rear_view_camera" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Rear View Camera</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="side_airbags" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Side Airbags</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="smart_key" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Smart Key</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="sun_roof" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Sunroof(s)</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="traction_control" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Traction Control</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="alloy_wheels" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Alloy Wheels</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="tubeless_tyres" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Tubeless Tyres</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="am_fm_stereo" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>AM/FM Stereo</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="auxiliary_audio_input" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Auxiliary Audio Input</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="cd_audio" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>CD Audio</label>
                    </div>
                  </div>
                                                                        <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="satellite_radio_ready" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Satellite Radio Ready</label>
                    </div>
                  </div>
                                            
                </div> 
                
              <div class="form-group mt-4">
                  <h5>More Information About Vehicle Condition</h5>
                </div>
                <hr>
              <div class="row radio_wrap">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group" required="">
                          <h6>Condition<span class="required">*</span></h6>
                        </div>

                      </div>
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="condition" value="0" class="form-control condition">
                                <span></span>
                            </div>                       
                            <label>Outstanding</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="condition" value="1" class="form-control condition">
                                <span></span>
                            </div>                       
                            <label>Clean</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="condition" value="2" class="form-control condition">
                                <span></span>
                            </div>                       
                            <label>Average</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="condition" value="3" class="form-control condition">
                                <span></span>
                            </div>                       
                            <label>Rough</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="condition" value="4" class="form-control condition">
                                <span></span>
                            </div>                       
                            <label>Damaged</label>
                          </div>
                                                  </div>
                        <div class="form-group field_error" id="condition_error" style="display:none">
                          <label for="conditon">This field is required.</label>
                        </div>
                      </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <h6>Has the vehicle ever been in an accident?<span class="required">*</span></h6>
                      </div>    

                      

                      <div class="row radio_wrap">
                        <div class="col-12">
                          <div class="form_inner_wrap d-flex">
                                                        <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" name="vehicle_ever_been_in_accident" value="1" class="form-control vehicle_ever_been_in_accident">
                                  <span></span>
                              </div>                       
                              <label>Yes</label>
                            </div>
                                                        <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" name="vehicle_ever_been_in_accident" value="0" class="form-control vehicle_ever_been_in_accident">
                                  <span></span>
                              </div>                       
                              <label>No</label>
                            </div>
                                                      </div>
                          <div class="form-group field_error" id="accident_error" style="display:none">
                            <label for="title">This field is required.</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 mt-3">
                      <div class="form-group">
                        <h6>Does the vehicle have any flood damage?<span class="required">*</span></h6>
                      </div>      

                      

                      <div class="row radio_wrap">
                        <div class="col-12">
                          <div class="form_inner_wrap d-flex flex-wrap">

                                                        <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" name="vehicle_has_any_flood_damage" value="1" class="form-control vehicle_has_any_flood_damage">
                                  <span></span>
                              </div>                       
                              <label>Yes</label>
                            </div>
                                                        <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" name="vehicle_has_any_flood_damage" value="0" class="form-control vehicle_has_any_flood_damage">
                                  <span></span>
                              </div>                       
                              <label>No</label>
                            </div>
                                                      
                          </div>
                          <div class="form-group field_error" id="flood_error" style="display:none">
                            <label for="title">This field is required.</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 mt-3">
                      <div class="form-group">
                        <h6>Does the vehicle have any frame damage?<span class="required">*</span></h6>
                      </div>


                      <div class="row radio_wrap">
                        <div class="col-12">
                          <div class="form_inner_wrap d-flex flex-wrap">
                                                        <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" name="vehicle_has_any_frame_damage" value="1" class="form-control vehicle_has_any_frame_damage">
                                  <span></span>
                              </div>                       
                              <label>Yes</label>
                            </div>
                                                        <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" name="vehicle_has_any_frame_damage" value="0" class="form-control vehicle_has_any_frame_damage">
                                  <span></span>
                              </div>                       
                              <label>No</label>
                            </div>
                                                      </div>
                          <div class="form-group field_error" id="frame_error" style="display:none">
                            <label for="title">This field is required.</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 mt-3">
                      <div class="form-group">
                        <h6>Any mechanical or other issues?<span class="required">*</span></h6>
                      </div>


                      <div class="row radio_wrap">
                        <div class="col-12">
                          <div class="form_inner_wrap d-flex flex-wrap">
                                                        <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" id="vehicle_has_any_mechanical_issues" name="vehicle_has_any_mechanical_issues" class="form-control vehicle_has_any_mechanical_issues" value="1">
                                  <span></span>
                              </div>                      
                              <label>Yes</label>
                            </div>
                                                        <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" id="vehicle_has_any_mechanical_issues" name="vehicle_has_any_mechanical_issues" class="form-control vehicle_has_any_mechanical_issues" value="0">
                                  <span></span>
                              </div>                      
                              <label>No</label>
                            </div>
                                                      </div>
                          <div class="form-group field_error" id="issue_error" style="display:none">
                            <label for="title">This field is required.</label>
                          </div>
                        </div>
                      </div>
                    </div>  

                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>Are any warning lights currently visible?<span class="required">*</span></h6>
                    </div>


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">

                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_warning_lights_currently_visible" class="form-control any_warning_lights_currently_visible" value="1">
                                <span></span>
                            </div>                      
                            <label>Yes</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_warning_lights_currently_visible" class="form-control any_warning_lights_currently_visible" value="0">
                                <span></span>
                            </div>                      
                            <label>No</label>
                          </div>
                                                    
                        </div>
                        <div class="form-group field_error" id="warning_error" style="display:none">
                          <label for="title">This field is required.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>Are there any panels in need of paint or body work?<span class="required">*</span></h6>
                    </div>


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">

                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_panel_in_need_of_paint_or_body_work" class="form-control any_panel_in_need_of_paint_or_body_work" id="any_panel_in_need_of_paint_or_body_work" value="1">
                                <span></span>
                            </div>                      
                            <label>1</label>
                          </div>
                                                   <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_panel_in_need_of_paint_or_body_work" class="form-control any_panel_in_need_of_paint_or_body_work" id="any_panel_in_need_of_paint_or_body_work" value="2">
                                <span></span>
                            </div>                      
                            <label>2</label>
                          </div>
                                                   <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_panel_in_need_of_paint_or_body_work" class="form-control any_panel_in_need_of_paint_or_body_work" id="any_panel_in_need_of_paint_or_body_work" value="3">
                                <span></span>
                            </div>                      
                            <label>3</label>
                          </div>
                                                   <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_panel_in_need_of_paint_or_body_work" class="form-control any_panel_in_need_of_paint_or_body_work" id="any_panel_in_need_of_paint_or_body_work" value="4">
                                <span></span>
                            </div>                      
                            <label>More</label>
                          </div>
                                                 </div>
                        <div class="form-group field_error" id="panel_error" style="display:none">
                          <label for="title">This field is required.</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>Are any interior parts broken or inoperable?<span class="required">*</span></h6>
                    </div>   


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">


                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_interior_parts_broken_or_inoperable" class="form-control any_interior_parts_broken_or_inoperable" value="1">
                                <span></span>
                            </div>                      
                            <label>1</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_interior_parts_broken_or_inoperable" class="form-control any_interior_parts_broken_or_inoperable" value="2">
                                <span></span>
                            </div>                      
                            <label>2</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_interior_parts_broken_or_inoperable" class="form-control any_interior_parts_broken_or_inoperable" value="3">
                                <span></span>
                            </div>                      
                            <label>3</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_interior_parts_broken_or_inoperable" class="form-control any_interior_parts_broken_or_inoperable" value="4">
                                <span></span>
                            </div>                      
                            <label>More</label>
                          </div>
                                                    

                        </div>
                        <div class="form-group field_error" id="broken_error" style="display:none">
                          <label for="title">This field is required.</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>Are there any rips, tears, or stains in the interior?<span class="required">*</span></h6>
                    </div>


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">


                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_rips_tears_or_strains_in_interior" name="any_rips_tears_or_strains_in_interior" class="form-control any_rips_tears_or_strains_in_interior" value="1">
                                <span></span>
                            </div>                      
                            <label>1</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_rips_tears_or_strains_in_interior" name="any_rips_tears_or_strains_in_interior" class="form-control any_rips_tears_or_strains_in_interior" value="2">
                                <span></span>
                            </div>                      
                            <label>2</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_rips_tears_or_strains_in_interior" name="any_rips_tears_or_strains_in_interior" class="form-control any_rips_tears_or_strains_in_interior" value="3">
                                <span></span>
                            </div>                      
                            <label>3</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_rips_tears_or_strains_in_interior" name="any_rips_tears_or_strains_in_interior" class="form-control any_rips_tears_or_strains_in_interior" value="4">
                                <span></span>
                            </div>                      
                            <label>More</label>
                          </div>
                                                    
                        </div>
                        <div class="form-group field_error" id="strain_error" style="display:none">
                          <label for="title">This field is required.</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>Do any tires need to be replaced?<span class="required">*</span></h6>
                    </div>


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">

                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_tyres_need_to_be_replaced" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" value="1">
                                <span></span>
                            </div>                      
                            <label>1</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_tyres_need_to_be_replaced" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" value="2">
                                <span></span>
                            </div>                      
                            <label>2</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_tyres_need_to_be_replaced" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" value="3">
                                <span></span>
                            </div>                      
                            <label>3</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_tyres_need_to_be_replaced" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" value="4">
                                <span></span>
                            </div>                      
                            <label>More</label>
                          </div>
                                                    
                        </div>
                        <div class="form-group field_error" id="replace_error" style="display:none">
                          <label for="title">This field is required.</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>Does the vehicle have any aftermarket modifications?<span class="required">*</span></h6>
                    </div>


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">

                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="vehicle_has_any_aftermarket_modification" name="vehicle_has_any_aftermarket_modification" class="form-control vehicle_has_any_aftermarket_modification" value="1">
                                <span></span>
                            </div>                      
                            <label>Yes</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="vehicle_has_any_aftermarket_modification" name="vehicle_has_any_aftermarket_modification" class="form-control vehicle_has_any_aftermarket_modification" value="0">
                                <span></span>
                            </div>                      
                            <label>No</label>
                          </div>
                                                    
                        </div>
                        <div class="form-group field_error" id="modification_error" style="display:none">
                          <label for="title">This field is required.</label>
                        </div>
                      </div>
                    </div>
                  </div>  

                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>Has the odometer ever been broken or replaced?<span class="required">*</span></h6>
                    </div>


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">

                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="odometer_broken_or_replaced" class="form-control odometer_broken_or_replaced" value="1">
                                <span></span>
                            </div>                      
                            <label>Yes</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="odometer_broken_or_replaced" class="form-control odometer_broken_or_replaced" value="0">
                                <span></span>
                            </div>                      
                            <label>No</label>
                          </div>
                                                    
                        </div>
                        <div class="form-group field_error" id="odometer_error" style="display:none">
                          <label for="title">This field is required.</label>
                        </div>
                      </div>
                    </div>
                  </div>
     
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>How many keys do you have?<span class="required">*</span></h6>
                    </div>


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">

                                                    <div class="form-group d-flex align-items-center mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="how_many_vehicle_keys" name="how_many_vehicle_keys" class="form-control how_many_vehicle_keys" value="0">
                                <span></span>
                            </div>                      
                            <label class="keys_count">1</label>
                          </div>
                                                    <div class="form-group d-flex align-items-center mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="how_many_vehicle_keys" name="how_many_vehicle_keys" class="form-control how_many_vehicle_keys" value="1">
                                <span></span>
                            </div>                      
                            <label class="keys_count">2 or More</label>
                          </div>
                                                    
                        </div>
                        <div class="form-group field_error" id="keys_error" style="display:none">
                          <label for="title">This field is required.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="trim">Model Year<span class="text-danger"> *</span></label>
                        <input type="text" name="vehicle_model_year" class="form-control" id="vehicle_model_year" maxlength="100">
                        @error('vehicle_model_year')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="mileage">Mileage<span class="text-danger"> *</span></label>
                        <input type="text" name="mileage" class="form-control" id="mileage" maxlength="100">
                        @error('mileage')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="trim">Selling Price<span class="text-danger"> *</span></label>
                        <input type="text" name="selling_price" class="form-control" id="selling_price" maxlength="100">
                        @error('selling_price')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="drive">Exterior color<span class="text-danger"> *</span></label>
                        <input type="text" name="exterior_color" class="form-control" id="exterior_color" maxlength="100">
                        @error('exterior_color')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="trim">Interior color<span class="text-danger"> *</span></label>
                        <input type="text" name="interior_color" class="form-control" id="interior_color" maxlength="100">
                        @error('interior_color')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fuel-type">Mpg highway<span class="text-danger"> *</span></label>
                        <select name="mpg_highway" class="form-control" id="mpg_highway">
                          <option value="" disabled="" selected>Select</option>
                         @foreach($mpg_highway as $item)
                        <option value="{{$item->value}}">{{$item->name_en}}</option>
                        @endforeach
                      
                        </select>
                        @error('mpg_highway')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                      </div>
                </div>
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
<!-- <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> -->

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- @section('js') -->
  <script>
      $('#add_car_details_form').validate({
          rules: {
              title: {
                  required: true
              }, 
              vehicle_make: {
                  required: true
              },
              // vehicle_model: {
              //     required: true
              // },
              vehicle_model_year: {
                  required: true
              },  
              vin: {
                  required: true
              },
              drives: {
                  required: true
              },
              trim: {
                  required: true
              },
              manufacturing_date: {
                  required: true
              },
              fuel_type: {
                  required: true
              },
              transmission: {
                  required: true
              },
              mileage: {
                  required: true
              },
              selling_price: {
                  required: true
              },
              exterior_color: {
                  required: true
              },
              interior_color: {
                  required: true
              },
              mpg_highway: {
                  required: true
              },
              description: {
                  required: true
              },
              // condition: {
              //     required: true
              // },
              // vehicle_ever_been_in_accident: {
              //     required: true
              // },
              // vehicle_has_any_flood_damage: {
              //     required: true
              // },
              // vehicle_has_any_frame_damage: {
              //     required: true
              // },
              // vehicle_has_any_mechanical_issues: {
              //     required: true
              // },
              // any_warning_lights_currently_visible: {
              //     required: true
              // },
              // any_panel_in_need_of_paint_or_body_work: {
              //     required: true
              // },
              // any_interior_parts_broken_or_inoperable: {
              //     required: true
              // },
              // any_rips_tears_or_strains_in_interior: {
              //     required: true
              // },
              // any_tyres_need_to_be_replaced: {
              //     required: true
              // },
              // vehicle_has_any_aftermarket_modification: {
              //     required: true
              // },
              // odometer_broken_or_replaced: {
              //     required: true
              // },
              // how_many_vehicle_keys: {
              //     required: true
              // },
             
          },
          messages: {
              title: {
                  required: "The Title is required."
              },            
              vehicle_make: {
                  required: "The Make is required."
              },
              // vehicle_model: {
              //     required: "The Model is required."
              // },
              vehicle_model_year: {
                  required: "The Model Year is required."
              },
              vin: {
                  required: "The Vin is required."
              },
              trim: {
                  required: "The Trim is required."
              },
              transmission: {
                  required: "The Transmission is required."
              },
              mileage: {
                  required: "The Mileage is required."
              },
              selling_price: {
                  required: "The Selling Price is required."
              },
              exterior_color: {
                  required: "The Exterior color is required."
              },
              interior_color: {
                  required: "The Interior color is required."
              },
              mpg_highway: {
                  required: "The Mpg highway is required."
              },
              description: {
                  required: "The Description is required."
              },
              manufacturing_date: {
                  required: "The Manufacturing Date is required."
              },
              drives: {
                  required: "The Drive is required."
              },

              // condition: {
              //     required: "The Condition is required."
              // },
              // vehicle_ever_been_in_accident: {
              //     required: "The Condition is required."
              // },
              // vehicle_has_any_flood_damage: {
              //     required: true
              // },
              // vehicle_has_any_frame_damage: {
              //     required: true
              // },
              // vehicle_has_any_mechanical_issues: {
              //     required: true
              // },
              // any_warning_lights_currently_visible: {
              //     required: true
              // },
              // any_panel_in_need_of_paint_or_body_work: {
              //     required: true
              // },
              // any_interior_parts_broken_or_inoperable: {
              //     required: true
              // },
              // any_rips_tears_or_strains_in_interior: {
              //     required: true
              // },
              // any_tyres_need_to_be_replaced: {
              //     required: true
              // },
              // vehicle_has_any_aftermarket_modification: {
              //     required: true
              // },
              // odometer_broken_or_replaced: {
              //     required: true
              // },
              // how_many_vehicle_keys: {
              //     required: true
              // },
             
          }
      });
  </script>

     <script type="text/javascript">
     $(document).ready(function() {
      var file_base64_array = [];
      if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {

          // check file type
          var ext = $(this).val().split('.').pop().toLowerCase();
          if(this.files[0] && $.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
             $('#image_error').text('Invalid file format.');
             $('#image_error').css('display','block');
             return false;
          }
          var a=(this.files[0].size);
          // alert(a/(1024*1024));
          if(a/(1024*1024) > 2) {
              $('#image_error').text('File size can not be greater than 2mb.');
              $('#image_error').css('display','block');
              return false;
          };
          // check file type
          $('#image_error').text('You must select an image.');
          $('#image_error').css('display','none');
          var files = e.target.files,
          filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;

              file_base64_array.push(e.target.result);
              console.log(file_base64_array);
              $('#image_array').val(file_base64_array);
              
              $("<span class=\"pip\" file=\"" + e.target.result + "\">" +
                "<img height=\"100\" width=\"100\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove\">X</span>" +
                "</span>").insertAfter("#files");
              $(".remove").click(function(){
                console.log('clicked---');
                console.log(file_base64_array.length);
                const index = file_base64_array.indexOf($(this).parent().attr('file'));
                if (index > -1) {
                  file_base64_array.splice(index, 1);
                }
                console.log(file_base64_array.length);
                $('#image_array').val(file_base64_array);
                $(this).parent(".pip").remove();
              });
              
            });
            fileReader.readAsDataURL(f);
          }
    
        });
      } else {
        alert("Your browser doesn't support to File API")
      }


      $(document).on('click','#submit_btn',function(){
        if($('#interior_color').val()!="" && $('#interior_color').val()!=null){
          if(file_base64_array.length<1){
            $('#image_error').css('display','block');
            return false;
          }else{
            $('#image_error').css('display','none');

          }
        }


        var flag = false;
      
        $("#condition_error").css('display','block');
        flag = true;
        $('.condition').each(function(){
          if($(this).prop('checked')){
            $("#condition_error").css('display','none');
            flag = false;
          }
        })

        $("#accident_error").css('display','block');
        flag = true;
        $('.vehicle_ever_been_in_accident').each(function(){
          if($(this).prop('checked')){
            $("#accident_error").css('display','none');
            flag = false;
          }
        })

        $("#flood_error").css('display','block');
        flag = true;
        $('.vehicle_has_any_flood_damage').each(function(){
          if($(this).prop('checked')){
            $("#flood_error").css('display','none');
            flag = false;
          }
        })

        $("#frame_error").css('display','block');
        flag = true;
        $('.vehicle_has_any_frame_damage').each(function(){
          if($(this).prop('checked')){
            $("#frame_error").css('display','none');
            flag = false;
          }
        })

        $("#issue_error").css('display','block');
        flag = true;
        $('.vehicle_has_any_mechanical_issues').each(function(){
          if($(this).prop('checked')){
            $("#issue_error").css('display','none');
            flag = false;
          }
        })

        $("#warning_error").css('display','block');
        flag = true;
        $('.any_warning_lights_currently_visible').each(function(){
          if($(this).prop('checked')){
            $("#warning_error").css('display','none');
            flag = false;
          }
        })

        $("#panel_error").css('display','block');
        flag = true;
        $('.any_panel_in_need_of_paint_or_body_work').each(function(){
          if($(this).prop('checked')){
            $("#panel_error").css('display','none');
            flag = false;
          }
        })

        $("#broken_error").css('display','block');
        flag = true;
        $('.any_interior_parts_broken_or_inoperable').each(function(){
          if($(this).prop('checked')){
            $("#broken_error").css('display','none');
            flag = false;
          }
        })

        $("#strain_error").css('display','block');
        flag = true;
        $('.any_rips_tears_or_strains_in_interior').each(function(){
          if($(this).prop('checked')){
            $("#strain_error").css('display','none');
            flag = false;
          }
        })

        $("#replace_error").css('display','block');
        flag = true;
        $('.any_tyres_need_to_be_replaced').each(function(){
          if($(this).prop('checked')){
            $("#replace_error").css('display','none');
            flag = false;
          }
        })

        $("#modification_error").css('display','block');
        flag = true;
        $('.vehicle_has_any_aftermarket_modification').each(function(){
          if($(this).prop('checked')){
            $("#modification_error").css('display','none');
            flag = false;
          }
        })

        $("#odometer_error").css('display','block');
        flag = true;
        $('.odometer_broken_or_replaced').each(function(){
          if($(this).prop('checked')){
            $("#odometer_error").css('display','none');
            flag = false;
          }
        })

        $("#keys_error").css('display','block');
        flag = true;
        $('.how_many_vehicle_keys').each(function(){
          if($(this).prop('checked')){
            $("#keys_error").css('display','none');
            flag = false;
          }
        })

        if(flag){
          if(($('#title').val()!="" && $('#title').val()!=null) && ($('#description').val()!="" && $('#description').val()!=null) && ($('#vehicle_make').val()!="" && $('#vehicle_make').val()!=null) && ($('#vehicle_model').val()!="" && $('#vehicle_model').val()!=null) && ($('#manufacturing_date').val()!="" && $('#manufacturing_date').val()!=null) && ($('#fuel_type').val()!="" && $('#fuel_type').val()!=null) && ($('#trim').val()!="" && $('#trim').val()!=null) && ($('#drives').val()!="" && $('#drives').val()!=null) && ($('#transmission').val()!="" && $('#transmission').val()!=null) && ($('#vin').val()!="" && $('#vin').val()!=null) && ($('#vehicle_model_year').val()!="" && $('#vehicle_model_year').val()!=null) && ($('#mileage').val()!="" && $('#mileage').val()!=null) && ($('#selling_price').val()!="" && $('#selling_price').val()!=null) && ($('#exterior_color').val()!="" && $('#exterior_color').val()!=null) && ($('#interior_color').val()!="" && $('#interior_color').val()!=null) && ($('#mpg_highway').val()!="" && $('#mpg_highway').val()!=null)){
            return false;
          }
        }

      })


    });
   </script>

   <script type="text/javascript">
    const input = document.getElementById('file-input');
    const video = document.getElementById('video');
    const videoSource = document.createElement('source');

    input.addEventListener('change', function() {
      $('#video').css('display','block');
      const files = this.files || [];

      if (!files.length) return;
      
      const reader = new FileReader();

      reader.onload = function (e) {
        videoSource.setAttribute('src', e.target.result);
        video.appendChild(videoSource);
        video.load();
        video.play();
      };
      
      reader.onprogress = function (e) {
        console.log('progress: ', Math.round((e.loaded * 100) / e.total));
      };
      
      reader.readAsDataURL(files[0]);
    });
   </script>

   <script type="text/javascript">
     $(document).on('click','#choose_video',function(){
      $('#file-input').click();
      $('#video_url').val("");

     })

     $(document).on('keyup','#video_url',function(){
      $('#file-input').val("")
      $('#video').css('display','none');
     })

     $(document).on('click','#choose_image', function(){
      $('#files').click();
     })


     $(document).on('change','#file-input',function(){
      // check file type
      var ext = $(this).val().split('.').pop().toLowerCase();
      if($.inArray(ext, ['mp4','mov','webm']) == -1) {
         $('#video').css('display','none');
         $('#file-input').val('');
         $('#video_error').text('Invalid file format.');
         $('#video_error').css('display','block');
         return false;
      }
      var a=(this.files[0].size);
      // alert(a/(1024*1024));
      if(a/(1024*1024) > 3) {
          $('#video').css('display','none');
          $('#file-input').val('');
          $('#video_error').text('File size can not be greater than 3mb.');
          $('#video_error').css('display','block');
          return false;
      };

      $('#video_error').text('');
      $('#video_error').css('display','none');
      // check file type
     })

   </script>
  
   
   
 
   <script type="text/javascript">
     $(document).on('change','#vehicle_make',function(){
        var brand_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           type:'POST',
           url:"{{route('get-model')}}",
           data :{
            brand_id : brand_id,
           },
           success:function(response) {
              console.log('success---------');
              var html = "";
              $.each(response.data,function(ind,val){
                html = html + '<option value="'+val.id+'">'+val.model_name_en+'</option>'
              })
              $('#vehicle_model').html(html);
           }
        });
     })
   </script>


   <script type="text/javascript">
     $(document).on('click','#check_all',function(){
      if($(this).prop('checked')==true){
        $('.checkbox').each(function(){
          $(this).prop('checked',true);
        })
      }else{
        $('.checkbox').each(function(){
          $(this).prop('checked',false);
        })
      }
     })

     $(document).on('click','.checkbox',function(){
      $('#check_all').prop('checked',false);
     })
   </script>
<!-- @stop -->
