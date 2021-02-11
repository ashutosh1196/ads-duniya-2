@extends('adminlte::page')

@section('title', 'Edit Content')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-sm btn-success float-right" href="{{ url()->previous() }}">Back</a>
            <h3>Edit Content</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="editContentForm" method="post", action="../update_content">
              @csrf
              <div class="card-body">
                <input type="hidden" name="id" class="form-control" id="id" value="{{ $pageContent->id }}">
                <div class="form-group">
                  <label for="page_title">Title</label>
                  <input type="title" name="title" class="form-control" id="page_title" value="{{ $pageContent->title }}">
                  @if($errors->has('title'))
                    <div class="error">{{ $errors->first('title') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="section">Section</label>
                  <?php
                  if($pageContent->section == "terms_and_conditions") {
                    $sectionName = "Terms and Conditions";
                  }
                  else if($pageContent->section == "privacy_policy") {
                    $sectionName = "Privacy Policy";
                  }
                  else if($pageContent->section == "about_us") {
                    $sectionName = "About Us";
                  }
                  ?>
                  <input type="text" name="section" class="form-control" id="section" value="{{ $sectionName }}" readonly>
                </div>
                <!-- <div class="form-group">
                  <label for="status">Status</label>
                  <input type="text" name="status" class="form-control" id="status" value="{{ $pageContent->status == 1 ? 'Active' : 'Inactive' }}" readonly>
                </div> -->
                <div class="form-group">
                  <label for="view">View</label>
                  <input type="text" name="view" class="form-control" id="view" value="{{ $pageContent->view == 1 ? 'Website' : 'Mobile' }}" readonly>
                </div>
                <textarea id="content" name="content">{{ $pageContent->content }}</textarea>
                @if($errors->has('content'))
                  <div class="error">{{ $errors->first('content') }}</div>
                @endif
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
    .error {
      color: #ff0000;
      font-weight: 500 !important;
    }
  </style>
@stop

@section('js')
  <script>
    $(document).ready(function() {
      // content
      CKEDITOR.replace( 'content', {
        customConfig : 'config.js',
        toolbar : 'simple'
      })
      $('#editContentForm').validate({
        ignore: [],
        debug: false,
        rules: {
          title: {
            required: true
          },
          content:{
            required: function() {
              CKEDITOR.instances.content.updateElement();
            },
            minlength:10
          }
        },
        messages: {
          title: {
            required: "Page Title is Required"
          },
          content: {
            required: "Page Content is Required",
            minlength: "Minimum Length must be 10"
          }
        }
      });
    });
  </script>
@stop
