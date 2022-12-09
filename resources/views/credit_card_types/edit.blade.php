@extends('adminlte::page')

@section('title', 'Edit Credit Card Type')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Credit Card Type</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{route('credit-card-types.update')}}" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id" value="{{$credit_card_type->id}}">

              <div class="card-body">                
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Name<span class="text-danger"> *</span></label>
                      <input type="text" name="name" value="{{$credit_card_type->name}}" class="form-control" id="name" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Status<span class="text-danger"> *</span></label>
                      <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                      
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
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "The Name is required."
          },
        }
      });
    });
  </script>
@stop
