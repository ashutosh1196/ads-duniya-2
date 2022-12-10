@extends('adminlte::page')

@section('title', 'Edit Why Choose Us')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Why Choose Us</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{route('choose-us.update')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">                
                <div class="row">

                  <input type="hidden" name="id" value="{{$choose_us->id}}">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Title<span class="text-danger"> *</span></label>
                      <input type="text" name="title" value="{{$choose_us->title}}" class="form-control" id="title" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Description<span class="text-danger"> *</span></label>
                      <textarea id="description" name="description">{{$choose_us->description}}</textarea>
                      
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
      
      CKEDITOR.replace( 'description', {
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
          
          description: {
            required: true
          },
        },
        messages: {
          title: {
            required: "The Title is required."
          },
          
          description: {
            required: "The Description is required."
          },
        }
      });
    });
  </script>
@stop
