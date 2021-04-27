@extends('adminlte::page')
@section('title', 'Edit Car')
@section('content_header')
@stop
@section('content')
<section id="form_wraper">
      <div id="particles-js"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="sell_form">

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
                @endif
              <div class="title text-center">
                <h4>Edit Car Details</h4>
              </div>


              <form action="{{ route('update-car-details') }}" method="post" enctype="multipart/form-data" id="add_car_details_form">
                @csrf

                <div class="form-group">
                  <h5>Primary Information</h5>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label></i>Title<span class="required">*</span></label>
                      <input type="text" class="form-control @error('title') error @enderror" name="title" id="title" value="{{ $inventory->title }}">
                      @error('title')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label>Description<span class="required">*</span></label>
                      <textarea class="form-control @error('description') error @enderror" name="description" id="description" value="{{ $inventory->description }}">{{ $inventory->description }}</textarea>
                      @error('description')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>

                  <input type="hidden" name="type" value="0">
                  <input type="hidden" name="vehicle_type" value="0">
                  <input type="hidden" name="id" value="{{$inventory->id}}">
                  
                  

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Make<span class="required">*</span></label>
                      <select name="vehicle_make" id="vehicle_make" class="form-control @error('vehicle_make') error @enderror">
                        <option value="" disabled="" selected>Select</option>
                        @foreach($make as $brand)
                        <option value="{{$brand->id}}" @if($inventory->make_id==$brand->id) selected @endif>{{$brand->brand_name_en}}</option>
                        @endforeach
                        
                      </select>
                      @error('vehicle_make')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><i class="fa fa-thumb-tack mr-1"></i>Model<span class="required">*</span></label>
                      <select name="vehicle_model" id="vehicle_model" name="vehicle_model" class="form-control @error('vehicle_model') error @enderror">
                        <option value="" disabled="" selected>Select vehicle Model</option>
                      </select>
                      @error('vehicle_model')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Manufacturing date<span class="required">*</span></label>
                      <input type="date" name="manufacturing_date" id="manufacturing_date" class="form-control @error('manufacturing_date') error @enderror" value="{{date('Y-m-d',strtotime($inventory->manufacturing_date))}}">


                      @error('manufacturing_date')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>  

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Fuel Type<span class="required">*</span></label>
                      <select name="fuel_type" id="fuel_type" class="form-control @error('fuel_type') error @enderror">
                        <option value="" disabled="" selected>Select</option>
                        @foreach($fuel_types as $fuel_type)
                        <option value="{{$fuel_type->value}}" @if($fuel_type->value==$inventory->fuel_type) selected @endif>{{$fuel_type->name_en}}</option>
                        @endforeach


                      </select>
                      @error('fuel_type')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="trim">Trim<span class="required">*</span></label>
                      <input type="text" name="trim" id="trim" class="form-control @error('trim') error @enderror" value="{{ $inventory->trim }}">
                      @error('trim')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Drive<span class="required">*</span></label>
                      <input type="text" name="drives" id="drives" class="form-control @error('drives') error @enderror" value="{{ $inventory->drives }}">
                      @error('drives')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Transmission<span class="required">*</span></label>
                      <select name="transmission" id="transmission" class="@error('transmission') error @enderror form-control">
                        <option value="" disabled="" selected>Select</option>
                        @foreach($transmissions as $transmission)
                        
                        <option value="{{$transmission->value}}" @if($transmission->value==$inventory->transmission) selected @endif>{{$transmission->name_en}}</option>
                        
                        @endforeach
                      </select>
                      @error('transmission')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Vin<span class="required">*</span></label>
                      <input type="text" name="vin" id="vin" class="form-control @error('vin') error @enderror" value="{{$inventory->vin}}">
                      @error('vin')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <h5>Extra Features</h5>
                </div>
                <hr>

                <div class="row checkbox_wrap">
                  <div class="col-12">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" id="check_all" name="check_all" class="form-control check_all">
                          <span></span>
                      </div>
                      <label class="select_all">Select All</label>
                    </div>
                  </div>
                  @foreach($extra_features as $extra_feature)
                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="custom_check">
                          <input type="checkbox" @if($inventory[$extra_feature->slug]==1) checked @endif name="{{$extra_feature->slug}}" class="form-control checkbox">
                          <span></span>
                      </div>
                      <label>{{$extra_feature->name_en}}</label>
                    </div>
                  </div>
                  
                  @endforeach
        
                </div>

                <br>
                <div class="form-group">
                  <h5>More information about the vehicle</h5>
                </div>
                <hr>

                <div class="row radio_wrap">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group" required>
                          <h6>Condition<span class="required">*</span></h6>
                        </div>

                      </div>
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">
                          @foreach($conditions as $condition)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="condition" @if($inventory->condition==$condition->value) checked @endif value="{{$condition->value}}" class="form-control condition">
                                <span></span>
                            </div>                       
                            <label>{{$condition->name_en}}</label>
                          </div>
                          @endforeach
                        </div>
                        <div class="form-group field_error" id="condition_error" style="display:none">
                          <label for="conditon">This field is required.</label>
                        </div>
                      </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <h6>Has vehicle even been to any accident?<span class="required">*</span></h6>
                      </div>    

                      

                      <div class="row radio_wrap">
                        <div class="col-12">
                          <div class="form_inner_wrap d-flex">
                            @foreach($accidents as $accident)
                            <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" @if($inventory->vehicle_ever_been_in_accident==$accident->value) checked @endif name="vehicle_ever_been_in_accident" value="{{$accident->value}}" class="form-control vehicle_ever_been_in_accident">
                                  <span></span>
                              </div>                       
                              <label>{{$accident->name_en}}</label>
                            </div>
                            @endforeach
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

                            @foreach($flood_damages as $flood_damage)
                            <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" name="vehicle_has_any_flood_damage" @if($inventory->vehicle_has_any_flood_damage==$flood_damage->value) checked @endif value="{{$flood_damage->value}}" class="form-control vehicle_has_any_flood_damage">
                                  <span></span>
                              </div>                       
                              <label>{{$flood_damage->name_en}}</label>
                            </div>
                            @endforeach
                          
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
                            @foreach($frame_damages as $frame_damage)
                            <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" name="vehicle_has_any_frame_damage" value="{{$frame_damage->value}}" @if($inventory->vehicle_has_any_frame_damage==$frame_damage->value) checked @endif class="form-control vehicle_has_any_frame_damage">
                                  <span></span>
                              </div>                       
                              <label>{{$frame_damage->name_en}}</label>
                            </div>
                            @endforeach
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
                            @foreach($mechanical_issues as $issue)
                            <div class="form-group mr-3">
                              <div class="custom_check radio">
                                  <input type="radio" id="vehicle_has_any_mechanical_issues" name="vehicle_has_any_mechanical_issues" @if($inventory->vehicle_has_any_mechanical_issues==$issue->value) checked @endif class="form-control vehicle_has_any_mechanical_issues" value="{{$issue->value}}">
                                  <span></span>
                              </div>                      
                              <label>{{$issue->name_en}}</label>
                            </div>
                            @endforeach
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

                          @foreach($lights_warning as $warning)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_warning_lights_currently_visible" class="form-control any_warning_lights_currently_visible"  @if($inventory->any_warning_lights_currently_visible==$warning->value) checked @endif value="{{$warning->value}}">
                                <span></span>
                            </div>                      
                            <label>{{$warning->name_en}}</label>
                          </div>
                          @endforeach
                          
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

                          @foreach($paint_or_body_work as $work)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_panel_in_need_of_paint_or_body_work" class="form-control any_panel_in_need_of_paint_or_body_work" id="any_panel_in_need_of_paint_or_body_work" @if($inventory->any_panel_in_need_of_paint_or_body_work==$work->value) checked @endif value="{{$work->value}}">
                                <span></span>
                            </div>                      
                            <label>{{$work->name_en}}</label>
                          </div>
                         @endforeach
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


                          @foreach($interior_part_broken as $broken)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_interior_parts_broken_or_inoperable" class="form-control any_interior_parts_broken_or_inoperable" value="{{$broken->value}}" @if($inventory->any_interior_parts_broken_or_inoperable==$broken->value) checked @endif>
                                <span></span>
                            </div>                      
                            <label>{{$broken->name_en}}</label>
                          </div>
                          @endforeach
                          

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


                          @foreach($interior_tear_or_strain as $strain)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_rips_tears_or_strains_in_interior" name="any_rips_tears_or_strains_in_interior" class="form-control any_rips_tears_or_strains_in_interior" @if($inventory->any_rips_tears_or_strains_in_interior==$strain->value) checked @endif value="{{$strain->value}}">
                                <span></span>
                            </div>                      
                            <label>{{$strain->name_en}}</label>
                          </div>
                          @endforeach
                          
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

                          @foreach($tyre_replacable as $replace)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="any_tyres_need_to_be_replaced" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" @if($inventory->any_tyres_need_to_be_replaced==$replace->value) checked @endif value="{{$replace->value}}">
                                <span></span>
                            </div>                      
                            <label>{{$replace->name_en}}</label>
                          </div>
                          @endforeach
                          
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

                          @foreach($aftermarket_modification as $modification)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="vehicle_has_any_aftermarket_modification" name="vehicle_has_any_aftermarket_modification" class="form-control vehicle_has_any_aftermarket_modification" value="{{$modification->value}}" @if($inventory->vehicle_has_any_aftermarket_modification==$modification->value) checked @endif>
                                <span></span>
                            </div>                      
                            <label>{{$modification->name_en}}</label>
                          </div>
                          @endforeach
                          
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

                          @foreach($odometer_broken as $odometer)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="odometer_broken_or_replaced" class="form-control odometer_broken_or_replaced" value="{{$odometer->value}}" @if($inventory->odometer_broken_or_replaced==$odometer->value) checked @endif>
                                <span></span>
                            </div>                      
                            <label>{{$odometer->name_en}}</label>
                          </div>
                          @endforeach
                          
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

                          @foreach($keys as $key)
                          <div class="form-group d-flex align-items-center mr-3">
                            <div class="custom_check radio">
                                <input type="radio" id="how_many_vehicle_keys" name="how_many_vehicle_keys" class="form-control how_many_vehicle_keys" value="{{$key->value}}" @if($inventory->how_many_vehicle_keys==$key->value) checked @endif>
                                <span></span>
                            </div>                      
                            <label class="keys_count">{{$key->name_en}}</label>
                          </div>
                          @endforeach
                          
                        </div>
                        <div class="form-group field_error" id="keys_error" style="display:none">
                          <label for="title">This field is required.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Model Year<span class="required">*</span></label>
                      <input type="text" class="form-control @error('vehicle_model_year') error @enderror" name="vehicle_model_year" id="vehicle_model_year" name="vehicle_model_year" value="{{ $inventory->vehicle_model_year }}">
                      @error('vehicle_model_year')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mileage<span class="required">*</span></label>
                      <input type="text" class="form-control @error('mileage') error @enderror" value="{{ $inventory->mileage }}" name="mileage" id="mileage">
                      @error('mileage')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>

                  <!-- miles traveled -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Miles Traveled<span class="required">*</span></label>
                      <input type="text" class="form-control @error('miles_traveled') error @enderror" value="{{ $inventory->miles_traveled }}" name="miles_traveled" id="miles_traveled">
                      @error('mileage')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>
                  <!-- miles traveled -->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Selling Price<span class="required">*</span></label>
                      <input type="text" class="form-control @error('selling_price') error @enderror" name="selling_price" value="{{ $inventory->selling_price }}" id="selling_price">
                      @error('selling_price')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Exterior color<span class="required">*</span></label>
                      <input type="text" class="form-control @error('exterior_color') error @enderror" name="exterior_color" id="exterior_color" value="{{ $inventory->exterior_color}}">
                      @error('exterior_color')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Interior color<span class="required">*</span></label>
                      <input type="text" class="form-control @error('interior_color') error @enderror" name="interior_color" id="interior_color" value="{{ $inventory->interior_color}}">
                      @error('interior_color')
                          <label class="error">
                              {{ $message }}
                          </label>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mpg highway<span class="required">*</span></label>
                      <select name="mpg_highway" id="mpg_highway" class="@error('mpg_highway') error @enderror form-control">
                        <option value="" disabled="" selected>Select</option>
                        @foreach($mpg_highway as $item)
                        <option value="{{$item->value}}" @if($item->value==$inventory->mpg_highway) selected @endif>{{$item->name_en}}</option>
                        @endforeach
                      </select>
                      @error('mpg_highway')
                          <label class="error">
                              {{ $message }}
                          </label>
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
                      <label>Upload images<span class="required">*</span></label>
                        <div class="note" role="alert">
                          Note: Please upload multiple images of exterior view from every angle and choose them to upload in respective order.
                        </div> 
                        <div class="alert alert-danger" role="alert" id="image_error" style="display:none">
                          You must select an image
                        </div> 

                      <div class="image_wrapper">
                        <button class="btn btn-info" type="button" id="choose_image"><i class="fa fa-plus"></i></button>
                        <input type="file" style="display:none" class="form-control col-md-6" id="files" name="files[]"/>
                        <input type="hidden" class="form-control" id="image_array" name="image_array"/>
                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Upload max 2MB file. Only jpg, png, jpeg, gif and webp files are allowed to upload">
                          <i class="fa fa-question-circle"></i>
                        </button>                        
                      </div>
                    
                    </div>
                  </div>

                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                  <div class="form-group">
                    <label>Images</label>
                    <br><br>
                    @foreach($inventory->images as $image)
                    
                    <span class="pip">
                      <img src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$image->file}}" height="100px" width="100px" class="imageThumb">
                      <br>
                      <span class="delete_image" data-id="{{$image->id}}" data-name="{{$image->file}}">X</span>
                    </span>

                    @endforeach
                  </div>
                </div>

                <!-- interior image -->

                <div class="form-group mt-4">
                   <h5>Vehicle Interior Image</h5>
                </div>
                <hr>
                <div class="row upload_images">
                   <div class="col-md-12">
                      <div class="form-group">
                         <label>Upload image<span class="required">*</span></label>
                         <div class="note" role="alert">
                            Note: Please upload panorama image of interior view of the car.
                            <br>
                            See an example of Panorama image: <a href="https://server3.rvtechnologies.in/Test/Central-Motors/public/storage/inventory_files/interior_panorama/car4.jpeg" style="color:blue;text-decoration:underline;">check here</a>
                            </div>   
                         <div class="alert alert-danger" role="alert" id="panorama_error" style="display:none">
                            You must select an image
                         </div>
                         <div class="image_wrapper">
                            <button class="btn btn-info" type="button" id="choose_panorama"><i class="fa fa-plus"></i></button>
                            <input type="file" style="display:none" class="form-control col-md-6" id="panorama_file" name="panorama_file"/>
                           
                            <input type="hidden" class="form-control" id="panorama_array" name="panorama_array"/>

                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Upload max 2MB file. Only jpg, png, jpeg, gif and webp files are allowed to upload">
                            <i class="fa fa-question-circle"></i>
                            </button>                        
                         </div>
                      </div>
                   </div>
                </div>

                @if($inventory->interior_image)
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                  <div class="form-group">
                    <label>Interior Image</label>
                    <br><br>
                    <span class="pip2">
                      <img src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/interior_panorama/'.'/'.@$inventory->interior_image->file}}" height="100px" width="100px" class="imageThumb">
                      <br>
                      <span class="delete_image2" data-id="{{@$inventory->interior_image->id}}" data-name="{{@$inventory->interior_image->file}}">X</span>
                    </span>  
                  </div>
                </div>
                @endif
                <!-- interior image -->


                <br>
                <div class="form-group">
                  <h5>Vehicle Video</h5>
                </div>
                <hr>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-0">
                      <div class="upload_video_title">
                        <label>Upload video</label>
                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Upload max 3MB file. Only mp4 mov webm files are allowed to upload"><i class="fa fa-question-circle"></i>
                        </button> 
                      </div>

                      <div class="alert alert-danger" role="alert" id="video_error" style="display:none">
                        
                      </div>

                      <button class="btn btn-info" type="button" id="choose_video">Choose video file</button>

                      <input id="file-input" style="display:none" type="file" accept="video/*" class="form-control col-md-6" name="video">
                      <br>
                      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                        <div class="form-group">
                          <video id="video_preview" style="display:none;height:auto;" width="300" height="300" controls class="form-control"></video>
                        </div>
                      </div>  
                    </div>
                  </div>


                  @if($inventory->video)
                  <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                    <div class="form-group">
                      <!-- <label>Vehicle Video</label><br><br> -->
                      <video id="video" width="300" height="300" src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$inventory->video->file}}" style="height:auto" controls class="form-control"></video>
                      
                    </div>
                  </div>
                  @endif


                </div>
                <div class="or">
                  <label>OR</label>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Video url</label>
                      <input type="text" class="form-control" value="{{@$inventory->video_url->file}}" name="video_url" id="video_url">
                    
                    </div>
                  </div>

                </div>
                <!-- vehicle media -->
                <!-- <input id="datepicker" width="270" /> -->

                <button type="submit" id="submit_btn" class="btn btn-primary mt-2"><i class="fa fa-sign-in mr-2"></i>Submit</button>
                
              </form>              
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('css')


<style type="text/css">
  .note{
    background-color: bisque;
    padding: 5px 10px;
    margin: 10px 0px;
  }
</style>

@stop

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
           vehicle_model: {
               required: true
           },
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
           miles_traveled: {
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
           
          
       },
       messages: {
           title: {
               required: "The Title is required."
           },            
           vehicle_make: {
               required: "The Make is required."
           },
           vehicle_model: {
               required: "The Model is required."
           },
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
           miles_traveled: {
               required: "The Miles Traveled is required."
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
   
          
       }
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
    var file_base64_array = [];
    var panorama_base64 = [];
    if (window.File && window.FileList && window.FileReader) {
      $("#files").on("change", function(e) {
        var ext = $(this).val().split('.').pop().toLowerCase();
        if(this.files[0] && $.inArray(ext, ['gif','png','jpg','jpeg','webp']) == -1) {
           $('#image_error').text('Invalid file format.');
           $('#image_error').css('display','block');
           return false;
        }
        var a=(this.files[0].size);
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


      // interior image
      $("#panorama_file").on("change", function(e) {
        var ext = $(this).val().split('.').pop().toLowerCase();
        if(this.files[0] && $.inArray(ext, ['gif','png','jpg','jpeg','webp']) == -1) {
           $('#panorama_error').text('Invalid file format.');
           $('#panorama_error').css('display','block');
           return false;
        }
        var a=(this.files[0].size);
        if(a/(1024*1024) > 5) {
            $('#panorama_error').text('File size can not be greater than 5mb.');
            $('#panorama_error').css('display','block');
            return false;
        };
        // check file type
        $('#panorama_error').text('You must select an image.');
        $('#panorama_error').css('display','none');
        var files = e.target.files,
        filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            panorama_base64[0] = e.target.result;
            // console.log(file_base64_array);
            $('#panorama_array').val(panorama_base64);
            $('.pip2').remove();  

            $("<span class=\"pip2\" file=\"" + e.target.result + "\">" +
              "<img height=\"100\" width=\"100\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">X</span>" +
              "</span>").insertAfter("#panorama_file");
            $(".remove").click(function(){
              console.log('clicked---');
              console.log(panorama_base64.length);
              const index = panorama_base64.indexOf($(this).parent().attr('file'));
              if (index > -1) {
                panorama_base64.splice(index, 1);
              }
              console.log(panorama_base64.length);
              $('#panorama_array').val(panorama_base64);
              $(this).parent(".pip2").remove();
            });
            
          });
          fileReader.readAsDataURL(f);
        }
   
      });
      // interior image


    } else {
      alert("Your browser doesn't support to File API")
    }
   
   
    $(document).on('click','#submit_btn',function(){
      if($('#interior_color').val()!="" && $('#interior_color').val()!=null){

        var image_counter = 0;
        $('.delete_image').each(function(){
          image_counter = image_counter+1;
        })
        console.log(image_counter);
        // return false;

        if(file_base64_array.length<1 && !image_counter){
          $('#image_error').css('display','block');
          return false;
        }else{
          $('#image_error').css('display','none');
   
        }

        var counter2 = 0;
        $('.delete_image2').each(function(){
          counter2 = counter2+1;
        })
        console.log(counter2);

        if(panorama_base64.length<1 && !counter2){
          $('#panorama_error').css('display','block');
          $('#panorama_file').focus();
          return false;
        }else{
          $('#panorama_error').css('display','none');
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
   if(input)
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

   $(document).on('click','#choose_panorama', function(){
    $('#panorama_file').click();
   })
   
   
   $(document).on('change','#file-input',function(){
    
    // video preview
    console.log('hello i am here-----------');
    $('#video').css('display','none');

    var fileInput = document.getElementById('file-input');
    var fileUrl = window.URL.createObjectURL(fileInput.files[0]);
    $('#video_preview').css('display','block');
    $("#video_preview").attr("src", fileUrl);
    
    // video preview



    var ext = $(this).val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['mp4','mov','webm']) == -1) {
       $('#video').css('display','none');
       $('#file-input').val('');
       $('#video_error').text('Invalid file format.');
       $('#video_error').css('display','block');
       return false;
    }
    var a=(this.files[0].size);
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

<!-- on load get models -->
<script type="text/javascript">
  $(document).ready(function(){
    var brand_id = $('#vehicle_make').val();

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
          var select = "";
          $.each(response.data,function(ind,val){
            if(val.id=="{{$inventory->model_id}}"){
              select = "selected";
            }else{
              select = "";
            }
            html = html + '<option value="'+val.id+'" '+select+'>'+val.model_name_en+'</option>'
          })
          $('#vehicle_model').html(html);
       }
    });

  })
</script>
<!-- on load get models -->

<!-- delete image -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).on('click','.delete_image',function(){
    var image_id = $(this).attr('data-id');
    var image_name = $(this).attr('data-name');
    console.log($(this).attr('data-name'));
    var obj = $(this).parent();
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to delete the image?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        obj.remove();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           type:'POST',
           url:"{{route('remove-image')}}",
           data :{
            image_id : image_id,
            image_name : image_name,
           },
           success:function(response) {
              console.log('success---------');
           }
        });
      } 
    });
  })


  $(document).on('click','.delete_image2',function(){
    var image_id = $(this).attr('data-id');
    var image_name = $(this).attr('data-name');
    console.log($(this).attr('data-name'));
    var obj = $(this).parent();
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to delete the image?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        obj.remove();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           type:'POST',
           url:"{{route('remove-image')}}",
           data :{
            image_id : image_id,
            image_name : image_name,
           },
           success:function(response) {
              console.log('success---------');
           }
        });
      } 
    });
  })

</script>
<!-- delete image -->