@extends('adminlte::page')

@section('title', 'Add Power Equipment')

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
            <h4>Power Equipment Details</h4>
          </div>
          <form id="sell_equipment_form" action="{{route('save-power-equipment')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <h5>Product Information</h5>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label><i class="fa fa-tag mr-1"></i>Title<span class="required">*</span></label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Name">
                </div>
              </div>
             
             <div class="col-12">
                <div class="form-group">
                  <label>Description<span class="required">*</span></label>
                  <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Make<span class="required">*</span></label>
                  <select name="make" id="make" class="form-control @error('make') error @enderror">
                    <option value="" disabled="" selected>Select</option>
                    @foreach($brands as $brand)
                    @if(session()->get('locale') == 'fr')
                    <option value="{{$brand->id}}">{{$brand->brand_name_fr}}</option>
                    @elseif(session()->get('locale') == 'sp')
                    <option value="{{$brand->id}}">{{$brand->brand_name_es}}</option>
                    @elseif(session()->get('locale') == 'hc')
                    <option value="{{$brand->id}}">{{$brand->brand_name_ht}}</option>
                    @else
                    <option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
                    @endif
                    @endforeach
                    
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label><i class="fa fa-thumb-tack mr-1"></i>Model<span class="required">*</span></label>
                  <select name="model" id="model" class="form-control @error('model') error @enderror">
                    <option value="">Select</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label><i class="fa fa-calendar mr-2"></i>Manufacturing Date<span class="required">*</span></label>
                  <input type="date" name="manufacturing_date" id="manufacturing_date" class="form-control" placeholder="DD/MM/YYYY" >
                </div>
              </div>  

              
             
              <div class="col-md-6">
                <div class="form-group">
                  <label>Selling Price<span class="required">*</span></label>
                  <input type="text" class="form-control" name="selling_price" id="selling_price" placeholder="Selling Price">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Color<span class="required">*</span></label>
                  <input type="text" class="form-control" name="color" id="color" placeholder="Color">
                </div>
              </div>

            

              <div class="col-md-6">
                <div class="form-group">
                  <label>Output Frequency<span class="required">*</span></label>
                  <input type="text" class="form-control" id="output_frequency" name="output_frequency" placeholder="Output Frequency">
                </div>
              </div>

            </div>
              


            <div class="form-group mt-4">
              <h5>Images</h5>
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
                      You must select an image
                    </div>
                  <div class="image_wrapper">
                    <button class="btn btn-info" type="button" id="choose_image"><i class="fa fa-plus"></i></button>

                    <input type="file" style="display:none" class="form-control col-md-6" id="files" name="files[]"/>

                    <input type="hidden" class="form-control" id="image_array" name="image_array"/>
                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Upload max 2MB file. Only jpg png jpeg gif files are allowed to upload">
                      <i class="fa fa-question-circle"></i>
                    </button>
                  </div>
                
                </div>
              </div>

            </div>

            <br>
            <div class="form-group">
              <h5>Video</h5>
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

                  <input id="file-input" style="display:none" type="file" name="video" accept="video/*" class="form-control col-md-6">
                  <br>
                  <video id="video" style="display:none;" width="300" height="300" controls class="form-control"></video>

                
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
                  <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Ex: http(s)://centrolmotors.com OR http(s)://www.centrolmotors.com">
                
                </div>
              </div>

            </div>
            <!-- vehicle media -->


            <button type="submit" id="submit_btn" class="btn btn-primary mt-2"><i class="fa fa-sign-in mr-2"></i>Submit</button>
          </form>              
        </div>
      </div>
    </div>
  </div>
</section>


<!-- js code -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  
    <script type="text/javascript">
     $(document).ready(function() {
      var file_base64_array = [];
      if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {

          var ext = $(this).val().split('.').pop().toLowerCase();
          if(this.files[0] && $.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
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
        if($('#output_frequency').val()!="" && $('#output_frequency').val()!=null){
          if(file_base64_array.length<1){
            $('#image_error').css('display','block');
            
            return false;
          }else{
            $('#image_error').css('display','none');

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

     $(document).on('click','#choose_image', function(){
      $('#files').click();
     })


     $(document).on('keyup','#video_url',function(){
      $('#file-input').val("")
      $('#video').css('display','none');
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
     $(document).on('change','#make',function(){
      console.log('here--');
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
              console.log(response);
              var html = "";
              $.each(response.data,function(ind,val){
                html = html + '<option value="'+val.id+'">'+val.model_name_en+'</option>'
              })
              $('#model').html(html);
           }
        });
     })
   </script>


   <!-- validation -->
   <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> 

   <script>
  
      $('#sell_equipment_form').validate({
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
            
             
              manufacturing_date: {
                  required: true
              },
              
             
             
              selling_price: {
                  required: true
              },
              color: {
                  required: true
              },
              
             
              description: {
                  required: true
              },

              output_frequency: {
                  required: true
              },
              
             
          },
          messages: {
              title: {
                  required: "The Title is required."
              },            
              make: {
                  required: "The Make is required."
              },
              model: {
                  required: "The Model is required."
              },
              
              selling_price: {
                  required: "The Selling Price is required."
              },
              color: {
                  required: "The Color is required."
              },
             
              
              description: {
                  required: "The Description is required."
              },
              manufacturing_date: {
                  required: "The Manufacturing Date is required."
              },

              output_frequency: {
                  required: "The Output Frequency is required."
              },
             
             
          }
      });
  </script>
   <!-- validation -->
<!-- js code -->


@endsection

@section('css')

@stop


