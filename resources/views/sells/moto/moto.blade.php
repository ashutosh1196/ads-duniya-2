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
            <h3>Moto Details</h3>
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
                        <label for="fuel-type">Fuel Type<span class="text-danger"> *</span></label>
                        <select name="fuel-type" class="form-control" id="fuel-type">
                       
                          <option value="">select</option>
                          <option value="0">cng</option>
                      
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
                        <label for="trim">Trim<span class="text-danger"> *</span></label>
                        <input type="text" name="trim" class="form-control" id="trim" maxlength="100">
                        @error('trim')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="drive">Displacement<span class="text-danger"> *</span></label>
                        <input type="text" name="drive" class="form-control" id="drive" maxlength="100">
                        @error('drive')
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
                      
                          <option value="">select</option>
                          <option value="0">automatic</option>
                       
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
                </div>
                <br>
                <div class="row checkbox_wrap">
                  
                                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="keyless_ignition" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Keyless Ignition</label>
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
                          <input type="checkbox" name="sports_bike_gas_tanks" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Sports Bike Gas Tanks</label>
                    </div>
                  </div>
                                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="leg_guards" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Leg Guards</label>
                    </div>
                  </div>
                                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="motorbike_alarms" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Motorbike Alarms</label>
                    </div>
                  </div>
                                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="sound_system" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Sound System</label>
                    </div>
                  </div>
                                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="front_disc_brakes" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Front Disc Brakes</label>
                    </div>
                  </div>
                                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="rear_disc_brakes" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Rear Disc Brakes</label>
                    </div>
                  </div>
                                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" name="digital_console" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Digital console</label>
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
                          <input type="checkbox" name="smart_key" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>Smart Key</label>
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
                  
                  
                </div>
              <div class="form-group mt-4">
                  <h5>More Information About Vehicle Condition</h5>
                </div>
                <hr>
               <div class="row radio_wrap">
                  <div class="col-md-6">
                    <div class="form-group">
                      <h6>Condition<span class="required">*</span></h6>
                    </div>


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
                  <div class="col-md-6">
                    <div class="form-group">
                      <h6>Has the vehicle ever been in an accident?<span class="required">*</span></h6>
                    </div>    


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">
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

                    <div class="form-group field_error" id="issue_error" style="display:none">
                      <label for="title">This field is required.</label>
                    </div>

                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="vehicle_has_any_mechanical_issues" class="form-control vehicle_has_any_mechanical_issues" value="1">
                                <span></span>
                            </div>                      
                            <label>Yes</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="vehicle_has_any_mechanical_issues" class="form-control vehicle_has_any_mechanical_issues" value="0">
                                <span></span>
                            </div>                      
                            <label>No</label>
                          </div>
                                                    
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>Do any tires need to be replaced?<span class="required">*</span></h6>
                    </div>

                    <div class="form-group field_error" id="replace_error" style="display:none">
                      <label for="title">This field is required.</label>
                    </div>

                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">
          
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" value="1">
                                <span></span>
                            </div>                      
                            <label>1</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" value="2">
                                <span></span>
                            </div>                      
                            <label>2</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" value="3">
                                <span></span>
                            </div>                      
                            <label>3</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" value="4">
                                <span></span>
                            </div>                      
                            <label>More</label>
                          </div>
                                                  </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>Does the vehicle have any aftermarket modifications?<span class="required">*</span></h6>
                    </div>

                    <div class="form-group field_error" id="modification_error" style="display:none">
                      <label for="title">This field is required.</label>
                    </div>

                    <div class="row radio_wrap">
                      <div class="col-md-6">
                        <div class="form_inner_wrap d-flex flex-wrap">
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="vehicle_has_any_aftermarket_modification" class="form-control vehicle_has_any_aftermarket_modification" value="1">
                                <span></span>
                            </div>                      
                            <label>Yes</label>
                          </div>
                                                    <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="vehicle_has_any_aftermarket_modification" class="form-control vehicle_has_any_aftermarket_modification" value="0">
                                <span></span>
                            </div>                      
                            <label>No</label>
                          </div>
                                                    
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <h6>How many keys do you have?<span class="required">*</span></h6>
                    </div>

                    <div class="form-group field_error" id="keys_error" style="display:none">
                      <label for="title">This field is required.</label>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">
                                                    <div class="form-group d-flex align-items-center mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="how_many_vehicle_keys" class="form-control how_many_vehicle_keys" value="0">
                                <span></span>
                            </div>                      
                            <label class="keys_count">1</label>
                          </div>
                                                    <div class="form-group d-flex align-items-center mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="how_many_vehicle_keys" class="form-control how_many_vehicle_keys" value="1">
                                <span></span>
                            </div>                      
                            <label class="keys_count">2 or More</label>
                          </div>
                                                    
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="trim">Model Year<span class="text-danger"> *</span></label>
                        <input type="text" name="trim" class="form-control" id="trim" maxlength="100">
                        @error('trim')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="drive">Mileage<span class="text-danger"> *</span></label>
                        <input type="text" name="drive" class="form-control" id="drive" maxlength="100">
                        @error('drive')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="trim">Selling Price<span class="text-danger"> *</span></label>
                        <input type="text" name="trim" class="form-control" id="trim" maxlength="100">
                        @error('trim')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="drive">Color<span class="text-danger"> *</span></label>
                        <input type="text" name="drive" class="form-control" id="drive" maxlength="100">
                        @error('drive')
                        <div id ="car_error" class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fuel-type">Mpg highway<span class="text-danger"> *</span></label>
                        <select name="fuel-type" class="form-control" id="fuel-type">
                       
                          <option value="">select</option>
                          <option value="0">cng</option>
                      
                        </select>
                        @error('make')
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
