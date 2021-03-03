@extends('adminlte::page')

@section('title', 'Add Page')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">Back</a>
            <h3>Add Page</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addPageForm" method="post", action="save_content">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="page_title">Title</label>
                  <input type="title" name="title" class="form-control" id="page_title">
                  @if($errors->has('title'))
                    <div class="error">{{ $errors->first('title') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="section">Section</label>
                  <select name="section" class="form-control" id="section">
                    <option value="terms_and_conditions">Terms and Conditions</option>
                    <option value="privacy_policy">Privacy Policy</option>
                    <option value="about_us">About Us</option>
                  </select>
                  @if($errors->has('section'))
                    <div class="error">{{ $errors->first('section') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select name="status" class="form-control" id="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                  @if($errors->has('status'))
                    <div class="error">{{ $errors->first('status') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="view">View</label>
                  <select name="view" class="form-control" id="view">
                    <option value="1">Website</option>
                    <option value="0">Mobile</option>
                  </select>
                  @if($errors->has('view'))
                    <div class="error">{{ $errors->first('view') }}</div>
                  @endif
                </div>
                <textarea id="content" name="content"></textarea>
                <div class="form-group mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="content" class="custom-control-input" id="exampleCheck1">
                  @if($errors->has('content'))
                    <div class="error">{{ $errors->first('content') }}</div>
                  @endif
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
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
      // content
      CKEDITOR.replace( 'content', {
        customConfig : 'config.js',
        toolbar : 'simple'
      })
      $('#addPageForm').validate({
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
            required: "The Page Title field is required."
          },
          content: {
            required: "The Page Content field is required.",
            minlength: "Minimum Length must be 10"
          }
        }
      });
    });
  </script>
@stop
