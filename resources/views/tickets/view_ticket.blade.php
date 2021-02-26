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
              <div class="container">
                <div class="row">           
                  <div class="col-12">
                    <div class="request_id">
                      <label>Request#41412</label>
                    </div>
                    <div class="subject">
                      <label>Question Regarding Credits</label>
                    </div>
                    <?php  for ($i=0; $i < count($ticketMessages); $i++) {  ?>
                      <div class="form_wrap mb-md-5 mb-4 message_wraper">
                        <div class="message_box">
                          <div class="profile">
                            <div class="user_img">
                              <?php
                                $publicPath = config('adminlte.website_url');
                                $logoPath = $publicPath.'images/companyLogos/';
                                $defauktProfileImage = $publicPath.'images/profile/default-profile-image.svg';
                              ?>
                              <img src="{{ $organizationLogo ? $logoPath.$organizationLogo : $defauktProfileImage }}" alt="">
                            </div>
                            <div class="user_detail">
                              <?php $recruiterName = $recruiter[0]->name ? $recruiter[0]->name : 'Anonymous'; ?>
                              <label class="name">{{ $ticketMessages[$i]->sent_by == 'admin' ? $superAdmin[0]->name : $recruiterName }}</label>
                              <label class="time_date">{{ date('F d, Y - H:i A', strtotime($ticketMessages[$i]->created_at)) }}</label>
                            </div>
                          </div>
                          <div class="message">
                            <p>{{ $ticketMessages[$i]->message_text }}</p>
                          </div>
                          <div class="attachment_show">
                            <div class="box_wrap">
                              <?php if($ticketMessages[$i]->attachment_file) {
                                $destinationPath = config('adminlte.website_url').'ticket_images/'; ?>
                                <img style="width: 500px;position:relative;left:20px" class="attached-image" src="{{ $destinationPath.$ticketMessages[$i]->attachment_file }}" alt="">
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <hr>
                      <?php } ?>
                      <form action="{{ route('reply_on_ticket') }}" method="post" id="replyForm" enctype="multipart/form-data">
                        <div class="message_reply">
                          <div class="form-group">
                            <textarea id="message_text" name="message_text" class="form-control"></textarea>
                            <div class="upload-file">
                              <input type="hidden" name="ticket_id" value="{{ $ticket[0]->id }}">
                              <input type="file" name="attachment_file" id="attachment_file">
                            </div>
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
@stop

@section('js')
  <script>
    $(document).ready(function() {
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
