@extends('adminlte::page')

@section('title', 'Add Moto')

@section('content_header')
@stop

@section('content')

 <section id="form_wraper">
      <div id="particles-js"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="sell_form">

              <!-- messages section -->
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
              <!-- messages section -->

              <div class="title text-center">
                <h4>Moto Details</h4>
              </div>
              <form id="add_car_details_form" action="{{route('update-moto-details')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <h5>Primary information</h5>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Title<span class="required">*</span></label>
                      <input type="text" class="form-control" name="title" id="title" value="{{$inventory->title}}">
                    </div>
                  </div>
                 

                  <div class="col-12">
                    <div class="form-group">
                      <label>Description<span class="required">*</span></label>
                      <textarea class="form-control" value="{{$inventory->description}}" name="description" id="description">{{$inventory->description}}</textarea>
                    </div>
                  </div>


                  <input type="hidden" name="type" value="1">
                  <input type="hidden" name="vehicle_type" value="1">
                  <input type="hidden" name="id" value="{{$inventory->id}}">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Make<span class="required">*</span></label>
                      <select name="make" id="make" class="form-control @error('make') error @enderror">
                        <option value="" disabled="" selected>Select</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}" @if($inventory->make_id==$brand->id) selected @endif>{{$brand->brand_name_en}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Model<span class="required">*</span></label>
                      <select name="model" id="model" class="form-control @error('model') error @enderror">
                       <option value="" disabled="" selected>Select Vehicle Model</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Manufacturing Date<span class="required">*</span></label>
                      <input type="date" name="manufacturing_date" id="manufacturing_date" class="form-control" value="{{date('Y-m-d',strtotime($inventory->manufacturing_date))}}">
                    </div>
                  </div>  

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Transmission<span class="required">*</span></label>
                      <select name="transmission" id="transmission" class="form-control @error('transmission') error @enderror">
                        <option value="" disabled="" selected>Select</option>
                        @foreach($transmissions as $transmission)
                        
                        <option value="{{$transmission->value}}" @if($transmission->value==$inventory->transmission) selected @endif>{{$transmission->name_en}}</option>
                        
                        @endforeach
                      </select>
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
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="trim">Trim<span class="required">*</span></label>
                      <input type="text" name="trim" id="trim" class="form-control" value="{{$inventory->trim}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="trim">Displacement<span class="required">*</span></label>
                      <input type="text" class="form-control" value="{{$inventory->displacement}}" name="displacement" id="displacement">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Vin<span class="required">*</span></label>
                      <input type="text" name="vin" id="vin" class="form-control" value="{{$inventory->vin}}">
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
                          <input type="checkbox" name="{{$extra_feature->slug}}" class="form-control checkbox" @if($inventory[$extra_feature->slug]==1) checked @endif>
                          <span></span>
                      </div>
                      <label>{{$extra_feature->name_en}}</label>
                    </div>
                  </div>
                  @endforeach

                  
                </div>

                <br>
                <div class="form-group">
                  <h5>More information about the Vehicle</h5>
                </div>
                <hr>
                <div class="row radio_wrap">
                  <div class="col-md-6">
                    <div class="form-group">
                      <h6>Condition<span class="required">*</span></h6>
                    </div>


                    <div class="form_inner_wrap d-flex flex-wrap">

                      @foreach($conditions as $condition)
                      <div class="form-group mr-3">
                        <div class="custom_check radio">
                            <input type="radio" name="condition" value="{{$condition->value}}" class="form-control condition" @if($inventory->condition==$condition->value) checked @endif>
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <h6>Has the vehicle ever been in an accident?<span class="required">*</span></h6>
                    </div>    


                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">
                          @foreach($accidents as $accident)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="vehicle_ever_been_in_accident" value="{{$accident->value}}" class="form-control vehicle_ever_been_in_accident" @if($inventory->vehicle_ever_been_in_accident==$accident->value) checked @endif>
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
                                <input type="radio" name="vehicle_has_any_flood_damage" value="{{$flood_damage->value}}" class="form-control vehicle_has_any_flood_damage" @if($inventory->vehicle_has_any_flood_damage==$flood_damage->value) checked @endif>
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
                                <input type="radio" name="vehicle_has_any_frame_damage" value="{{$frame_damage->value}}" class="form-control vehicle_has_any_frame_damage" @if($inventory->vehicle_has_any_frame_damage==$frame_damage->value) checked @endif>
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

                    <div class="form-group field_error" id="issue_error" style="display:none">
                      <label for="title">This field is required.</label>
                    </div>

                    <div class="row radio_wrap">
                      <div class="col-12">
                        <div class="form_inner_wrap d-flex flex-wrap">
                          @foreach($mechanical_issues as $issue)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="vehicle_has_any_mechanical_issues" class="form-control vehicle_has_any_mechanical_issues" value="{{$issue->value}}" @if($inventory->vehicle_has_any_mechanical_issues==$issue->value) checked @endif>
                                <span></span>
                            </div>                      
                            <label>{{$issue->name_en}}</label>
                          </div>
                          @endforeach
                          
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
          
                          @foreach($tyre_replacable as $replace)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="any_tyres_need_to_be_replaced" class="form-control any_tyres_need_to_be_replaced" value="{{$replace->value}}" @if($inventory->any_tyres_need_to_be_replaced==$replace->value) checked @endif>
                                <span></span>
                            </div>                      
                            <label>{{$replace->name_en}}</label>
                          </div>
                          @endforeach
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
                          @foreach($aftermarket_modification as $modification)
                          <div class="form-group mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="vehicle_has_any_aftermarket_modification" class="form-control vehicle_has_any_aftermarket_modification" value="{{$modification->value}}" @if($inventory->vehicle_has_any_aftermarket_modification==$modification->value) checked @endif>
                                <span></span>
                            </div>                      
                            <label>{{$modification->name_en}}</label>
                          </div>
                          @endforeach
                          
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
                          @foreach($keys as $key)
                          <div class="form-group d-flex align-items-center mr-3">
                            <div class="custom_check radio">
                                <input type="radio" name="how_many_vehicle_keys" class="form-control how_many_vehicle_keys" value="{{$key->value}}" @if($inventory->how_many_vehicle_keys==$key->value) checked @endif>
                                <span></span>
                            </div>                      
                            <label class="keys_count">{{$key->name_en}}</label>
                          </div>
                          @endforeach
                          
                        </div>
                      </div>
                    </div>
                  </div>

                </div>



                <div class="row mt-4">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Model Year<span class="required">*</span></label>
                      <input type="text" class="form-control" name="model_year" id="model_year" value="{{$inventory->vehicle_model_year}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mileage<span class="required">*</span></label>
                      <input type="text" class="form-control" name="mileage" id="mileage" value="{{$inventory->mileage}}">
                    </div>
                  </div>

                  <!-- miles traveled -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Miles Traveled<span class="required">*</span></label>
                      <input type="text" class="form-control" name="miles_traveled" id="miles_traveled" value="{{$inventory->miles_traveled}}">
                    </div>
                  </div>
                  <!-- miles traveled -->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Selling Price<span class="required">*</span></label>
                      <input type="text" class="form-control" name="selling_price" id="selling_price" value="{{$inventory->selling_price}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Color</label>
                      <input type="text" class="form-control" name="color" id="color" id="color" value="{{$inventory->exterior_color}}">
                    </div>
                  </div>
                 
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mpg highway<span class="required">*</span></label>
                      <select name="mpg_highway" id="mpg_highway" class="form-control @error('mpg_highway') error @enderror">
                        <option value="" disabled="" selected>Select</option>
                        @foreach($mpg_highway as $item)
                        <option value="{{$item->value}}" @if($item->value==$inventory->mpg_highway) selected @endif>{{$item->name_en}}</option>
                        @endforeach
                      </select>
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
                        <div class="alert alert-danger" role="alert" id="image_error" style="display:none">
                          You must select an image.
                        </div> 

                      <div class="image_wrapper">
                        <button class="btn btn-info" type="button" id="choose_image"><i class="fa fa-plus"></i></button>

                        <input type="file" style="display:none" class="form-control col-md-6" id="files" name="files[]"/>

                        <input type="hidden" class="form-control" id="image_array" name="image_array"/>
                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Upload max 2MB file. Only jpg jpeg png gif files are allowed to upload">
                          <i class="fa fa-question-circle"></i>
                        </button>
                      </div>
                    
                    </div>
                  </div>

                </div>


                <!-- show images -->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                  <div class="form-group">
                    <label>Images</label>
                    <br><br>
                    @foreach($inventory->images as $image)
                    <!-- <img src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$image->file}}" height="150" width="auto" /> -->
                    <span class="pip">
                      <img src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$image->file}}" height="100px" width="100px" class="imageThumb">
                      <br>
                      <span class="delete_image" data-id="{{$image->id}}" data-name="{{$image->file}}">X</span>
                    </span>

                    @endforeach
                  </div>
                </div>
                <!-- show images -->

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

                  <!-- show video -->
                  @if($inventory->video)
                  <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                    <div class="form-group">
                      <!-- <label>Vehicle Video</label><br><br> -->
                      <video id="video" width="300" height="300" src="{{env('APP_URL').'/'.env('FRONT_END_PROJECT_NAME').'/public/storage/inventory_files/'.'/'.$inventory->video->file}}" style="height:auto" controls class="form-control"></video>
                      
                    </div>
                  </div>
                  @endif
                  <!-- show video -->


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


                <button type="submit" id="submit_btn" class="btn btn-primary mt-2">Submit</button>
              </form>              
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('css')
 
@stop

<style>
  .required label{
    color:red;
    font-weight: 300 !important;
  }
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- @section('js') -->
  <script type="text/javascript">
     $(document).ready(function() {
      var file_base64_array = [];
      if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {

          // check file type
          var ext = $(this).val().split('.').pop().toLowerCase();
          if(this.files[0] && $.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
             // return alert('Invalid file format!');
             $('#image_error').text('Invalid file format.');
             $('#image_error').css('display','block');
             return false;
          }
          var a=(this.files[0].size);
          // alert(a/(1024*1024));
          if(a/(1024*1024) > 2) {
              // return alert('File size can not be greater than 2mb');
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
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
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
        if($('#color').val()!="" && $('#color').val()!=null){


          var image_counter = 0;
          $('.delete_image').each(function(){
            image_counter = image_counter+1;
          })
          console.log(image_counter);

          if(file_base64_array.length<1 && !image_counter){
            $('#image_error').css('display','block');
            return false;
          }else{
            $('#image_error').css('display','none');

          }
        }

       
        $("#condition_error").css('display','block');
        var condition_flag = true;
        $('.condition').each(function(){
          if($(this).prop('checked')){
            $("#condition_error").css('display','none');
            condition_flag = false;
          }
        })

        // advertisement
        $("#advertisement_error").css('display','block');
        var advertisement_flag = true;
        $('.advertisement').each(function(){

          if($(this).prop('checked')){
            $("#advertisement_error").css('display','none');
            advertisement_flag = false;
          }
        })
        // advertisement

        $("#accident_error").css('display','block');
        var accident_flag = true;
        $('.vehicle_ever_been_in_accident').each(function(){
          if($(this).prop('checked')){
            $("#accident_error").css('display','none');
            accident_flag = false;
          }
        })

        $("#flood_error").css('display','block');
        var flood_flag = true;
        $('.vehicle_has_any_flood_damage').each(function(){
          if($(this).prop('checked')){
            $("#flood_error").css('display','none');
            flood_flag = false;
          }
        })

        $("#frame_error").css('display','block');
        var frame_flag = true;
        $('.vehicle_has_any_frame_damage').each(function(){
          if($(this).prop('checked')){
            $("#frame_error").css('display','none');
            frame_flag = false;
          }
        })

        $("#issue_error").css('display','block');
        var issue_flag = true;
        $('.vehicle_has_any_mechanical_issues').each(function(){
          if($(this).prop('checked')){
            $("#issue_error").css('display','none');
            issue_flag = false;
          }
        })

        $("#replace_error").css('display','block');
        var replace_flag = true;
        $('.any_tyres_need_to_be_replaced').each(function(){
          if($(this).prop('checked')){
            $("#replace_error").css('display','none');
            replace_flag = false;
          }
        })

        $("#modification_error").css('display','block');
        var modification_flag = true;
        $('.vehicle_has_any_aftermarket_modification').each(function(){
          if($(this).prop('checked')){
            $("#modification_error").css('display','none');
            modification_flag = false;
          }
        })

        $("#keys_error").css('display','block');
        var keys_flag = true;
        $('.how_many_vehicle_keys').each(function(){
          if($(this).prop('checked')){
            $("#keys_error").css('display','none');
            keys_flag = false;
          }
        })

        if(condition_flag || accident_flag || flood_flag || frame_flag || issue_flag || replace_flag || modification_flag || keys_flag){
          if(($('#title').val()!="" && $('#title').val()!=null) && ($('#description').val()!="" && $('#description').val()!=null) && ($('#make').val()!="" && $('#make').val()!=null) && ($('#model').val()!="" && $('#model').val()!=null) && ($('#manufacturing_date').val()!="" && $('#manufacturing_date').val()!=null) && ($('#trim').val()!="" && $('#trim').val()!=null) && ($('#transmission').val()!="" && $('#transmission').val()!=null) && ($('#vin').val()!="" && $('#vin').val()!=null) && ($('#displacement').val()!="" && $('#displacement').val()!=null) && ($('#model_year').val()!="" && $('#model_year').val()!=null) && ($('#mileage').val()!="" && $('#mileage').val()!=null) && ($('#selling_price').val()!="" && $('#selling_price').val()!=null) && ($('#color').val()!="" && $('#color').val()!=null) && ($('#mpg_highway').val()!="" && $('#mpg_highway').val()!=null)){
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

       // video preview
      console.log('hello i am here-----------');
      $('#video').css('display','none');

      var fileInput = document.getElementById('file-input');
      var fileUrl = window.URL.createObjectURL(fileInput.files[0]);
      $('#video_preview').css('display','block');
      $("#video_preview").attr("src", fileUrl);
      
      // video preview

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
     $(document).on('change','#make',function(){
      console.log('working');
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
              $('#model').html(html);
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


   <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> 

   <script>
  
      $('#add_car_details_form').validate({
          rules: {
              title: {
                  required: true
              }, 
              make: {
                  required: true
              },
              model: {
                  required: true
              },
              model_year: {
                  required: true
              },  
              vin: {
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
              color: {
                  required: true
              },
              
              mpg_highway: {
                  required: true
              },
              description: {
                  required: true
              },
              displacement: {
                  required: true
              },
          },
          messages: {
              title: {
                  required: "The Title is required."
              }, 
              fuel_type: {
                  required: "The Fuel Type is required."
              },            
              make: {
                  required: "The Make is required."
              },
              model: {
                  required: "The Model is required."
              },
              model_year: {
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
              color: {
                  required: "The Color is required."
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
              displacement: {
                  required: "The Displacement is required."
              },
              
             
          }
      });
  </script>

<!-- @stop -->


<!-- on load get models -->
<script type="text/javascript">
  $(document).ready(function(){
    var brand_id = $('#make').val();

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
          $('#model').html(html);
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
</script>
<!-- delete image -->