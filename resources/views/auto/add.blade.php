@extends('adminlte::page')

@section('title', 'Add Auto')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Add Auto</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{route('auto.save')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">                
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Title<span class="text-danger"> *</span></label>
                      <input type="text" name="name" class="form-control" id="name" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Seller<span class="text-danger"> *</span></label>
                      <select name="seller" id="seller" class="form-control">
                        <option>Select Seller</option>
                        @foreach($sellers as $seller)
                        <option value="{{$seller->id}}">{{$seller->name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Inspection Charge<span class="text-danger"> *</span></label>
                      <input type="text" name="inspection_charge" class="form-control" id="inspection_charge" maxlength="100">                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Time Duration<span class="text-danger"> *</span></label>
                      <input type="text" name="time_duration" class="form-control" id="time_duration" maxlength="100">                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="apply_url">Apply Url<span class="text-danger"> *</span></label>
                      <input type="text" name="apply_url" class="form-control" id="apply_url" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">More Details<span class="text-danger"> *</span></label>
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
          name: {
            required: true,
          },
          seller: {
            required: true,
          },
          
          inspection_charge: {
            required: true,
          },
          time_duration: {
            required: true,
          },
          apply_url: {
            required: true,
          },
          content: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "The Title is required."
          },
          seller: {
            required: "The Seller is required."
          },
          inspection_charge: {
            required: "The Inspection Charge is required."
          },
          time_duration: {
            required: "The Time Duration is required."
          },
          apply_url: {
            required: "The Apply Url is required."
          },
          content: {
            required: "The Content is required."
          },
        }
      });
    });
  </script>
@stop
