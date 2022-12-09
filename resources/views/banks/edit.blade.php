@extends('adminlte::page')

@section('title', 'Edit Bank')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Bank</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{route('banks.update')}}" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id" value="{{$bank->id}}">

              <div class="card-body">                
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Name<span class="text-danger"> *</span></label>
                      <input type="text" name="name" value="{{$bank->name}}" class="form-control" id="name" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="status">Status<span class="text-danger"> *</span></label>
                      <select class="form-control" name="status" id="status">
                        <option value="1" @if($bank->status==1) selected @endif>Active</option>
                        <option value="0" @if($bank->status==0) selected @endif>Inactive</option>
                      </select>
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Logo</label>
                      <input type="file" name="logo" class="form-control" id="logo" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <img src="{{asset('banks/'.$bank->logo)}}" id="preview" style="width:50%">
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
      
      $('#addAdminForm').validate({
        
        rules: {
          name: {
            required: true,
            minlength : 2,
          },
         
        },
        messages: {
          name: {
            required: "The Name is required."
          },
          
        }
      });
    });

    $(document).on('change','#logo',function(){
      
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('preview');
          output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
      
    })
  </script>
@stop
