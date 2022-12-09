@extends('adminlte::page')

@section('title', 'Add Blog')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Add Blog</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{route('blogs.save')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">                
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Title<span class="text-danger"> *</span></label>
                      <input type="text" name="title" class="form-control" id="title" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Image<span class="text-danger"> *</span></label>
                      <input type="file" name="image" class="form-control" id="image" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Description<span class="text-danger"> *</span></label>
                      <textarea id="content" name="content"></textarea>
                      
                    </div>
                  </div>

                
               </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary">{{ __('adminlte::adminlte.save') }}</button>
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

      CKEDITOR.replace( 'content', {
        customConfig : 'config.js',
        toolbar : 'simple'
      })
      
      $('#addAdminForm').validate({
        ignore: [],
        debug: false,
        rules: {
          title: {
            required: true,
          },
          image: {
            required: true
          },
          content: {
            required: true
          },
        },
        messages: {
          title: {
            required: "The Title is required."
          },
          image: {
            required: "The Image is required."
          },
          content: {
            required: "The Content is required."
          },
        }
      });
    });
  </script>
@stop
