@extends('adminlte::page')

@section('title', 'Ticket messages')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>{{ __('adminlte::adminlte.ticket_messages') }}</h1>
    <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">Back</a>
  </div>
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

            <div id="form_wrap_main" class="">
              <div class="">
                <div class="row">           
                  <div class="col-12">
                    <div class="subject_wraper">
                      <div class="request_id">
                        <label>Request#{{ $ticket->id }}</label>
                      </div>
                      <div class="subject">
                        <label>{{ $ticket->subject }}</label>
                      </div>                      
                    </div>
                    <div class="form_wrap message_wraper">
                      <?php  for ($i=0; $i < count($ticketMessages); $i++) {  ?>
                      <div class="message_box">
                        <div class="profile">
                          <div class="user_img">
                            <?php
                              $publicPath = config('adminlte.website_url');
                              $logoPath = $publicPath.'images/companyLogos/';
                              $defaultProfileImage = config("adminlte.default_avatar");
                            ?>
                            @if($ticketMessages[$i]->sent_by == 'admin')
                              <img src="{{ $defaultProfileImage }}" alt="">
                            @else
                              <img src="{{ $organizationLogo ? $logoPath.$organizationLogo : $defaultProfileImage }}" alt="">
                            @endif
                          </div>
                          <div class="user_detail">
                            <?php $recruiterName = $recruiter->first_name ? $recruiter->first_name.' '.$recruiter->last_name : $recruiter->email; ?>
                            @if($ticketMessages[$i]->sent_by == 'admin')
                              <label class="name">{{ $superAdmin[0]->name }}</label>
                            @else
                              <a href="{{ route('view_recruiter', ['id' => $recruiter->id ]) }}"><label class="name">{{ $recruiterName }}</label></a>
                            @endif
                            <label class="time_date">{{ $ticketMessages[$i]->created_at ? date('d/m/y', strtotime($ticketMessages[$i]->created_at)) : '' }}</label>
                          </div>
                        </div>
                        <div class="message">
                          <p>{{ $ticketMessages[$i]->message_text }}</p>
                        </div>
                        <div class="attachment_show">
                          <div class="box_wrap">
                            <?php if($ticketMessages[$i]->attachment_file) {
                              $destinationPath = config('adminlte.website_url').'ticket_images/';
                              $extension = explode('.', $ticketMessages[$i]->attachment_file)[1];
                            ?>
                              @if($extension == 'pdf')
                                <a target="_blank" href="{{ $destinationPath.$ticketMessages[$i]->attachment_file }}">
                                  <img class="attached-pdf" src="{{ $destinationPath.'pdf_logo.jpeg' }}">
                                  {{ $ticketMessages[$i]->attachment_file }}
                                </a>
                              @elseif($extension == 'doc')
                                <a target="_blank" href="{{ $destinationPath.$ticketMessages[$i]->attachment_file }}">
                                  <img class="attached-doc" src="{{ $destinationPath.'doc_logo.jpeg' }}">
                                  {{ $ticketMessages[$i]->attachment_file }}
                                </a>
                              @else
                                <a target="_blank" href="{{ $destinationPath.$ticketMessages[$i]->attachment_file }}">
                                  <img class="attached-image" src="{{ $destinationPath.$ticketMessages[$i]->attachment_file }}">
                                </a>
                              @endif
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <?php } ?>
                    </div>
                      <form action="{{ route('reply_on_ticket') }}" method="post" id="replyForm" enctype="multipart/form-data">
                      <div class="message_reply">
                        <div class="form-group">
                          <textarea id="message_text" name="message_text" class="form-control" maxlength="1000"></textarea>
                          <div class="file_upload_wrap upload-file" file-name="Upload File">
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                          <input type="file" name="attachment_file" id="attachment_file" accept=".jpg, .JPG, .jpeg, .JPEG, .gif, .GIF, .png, .PNG, .doc, .DOC, .docx, .DOCX, .xls, .XLS, .xlsx, .XLSX, .pdf, .PDF">
                          </div>
                          <div class="error" id="image_error"></div>
                          <button type="submit">Reply</button>                              
                        </div>
                      </div>
                    </form>                                     
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('css')
<style>
  .message_reply .upload-file:after {
    content: attr(file-name);
  }
  img.attached-pdf, img.attached-doc {
    border: 0px none !important;
    width: 30px !important;
    height: 30px !important;
  }
</style>
@stop

@section('js')
  <script>
    $('body').on('change','input[name=attachment_file]',function(){
      $(this).parent().attr('file-name', $(this)[0].files[0].name);
    });
    $(document).ready(function() {
      var input = document.getElementById('attachment_file');
      $(input).change(function (e) {
        var files = e.target.files;
        if (files && files.length > 0) {
          file = files[0];
          var fileName = file.name;
          var fileExtension = fileName.substr((fileName.lastIndexOf('.') + 1));
          console.log (fileExtension);
          if(fileExtension != "jpg" &&
             fileExtension != "JPG" &&
             fileExtension != "jpeg" &&
             fileExtension != "JPEG" &&
             fileExtension != "gif" &&
             fileExtension != "GIF" &&
             fileExtension != "png" &&
             fileExtension != "PNG" &&
             fileExtension != "doc" && 
             fileExtension != "DOC" && 
             fileExtension != "docx" && 
             fileExtension != "DOCX" && 
             fileExtension != "xls" && 
             fileExtension != "XLS" &&  
             fileExtension != "xlsx" && 
             fileExtension != "XLSX" &&
             fileExtension != "pdf" && 
             fileExtension != "PDF"
            ) {
            $("#image_error").html("Only .jpg .gif .png .doc .xls .xlsx files are allowed to upload.");
            return false;
          }
          else {
            if(file.size <= 2000000) {
              $("#image_error").html("");
            }
            else {
              $("#image_error").html("The File must be less than or equal to 2 MB.");
              return false;
            }
          }
        }
      });
      $('#replyForm').validate({
        ignore: [],
        debug: false,
        rules: {
          message_text: {
            required: true
          },
        },
        messages: {
          message_text: {
            required: "The Message field Name is required."
          },
        }
      });
    });
  </script>
@stop
