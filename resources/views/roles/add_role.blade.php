@extends('adminlte::page')

@section('title', 'Add Role')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">Back</a>
            <h3>{{ __('adminlte::adminlte.add_role') }}</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addRoleForm" method="post", action="save">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="role_name">{{ __('adminlte::adminlte.name') }}</label>
                  <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Enter Title">
                  @if($errors->has('role_name'))
                    <div class="error">{{ $errors->first('role_name') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="permissions">{{ __('adminlte::adminlte.permissions') }}</label>
                  <br/>
                  <input type="checkbox" name="permissions" value="list" id="permissions" > {{ __('adminlte::adminlte.list_data') }}<br/>
                  <input type="checkbox" name="permissions" value="add" id="permissions" > {{ __('adminlte::adminlte.add_data') }}<br/>
                  <input type="checkbox" name="permissions" value="edit" id="permissions" > {{ __('adminlte::adminlte.edit_data') }}<br/>
                  <input type="checkbox" name="permissions" value="delete" id="permissions" > {{ __('adminlte::adminlte.delete_data') }}
                  @if($errors->has('permissions'))
                    <div class="error">{{ $errors->first('permissions') }}</div>
                  @endif
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('adminlte::adminlte.save') }}</button>
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
      $('#addRoleForm').validate({
        ignore: [],
        debug: false,
        rules: {
          role_name: {
            required: true
          },
          permissions:{
            required: true
          }
        },
        messages: {
          role_name: {
            required: "The Role Name field is required."
          },
          permissions: {
            required: "The Permission field is required.",
          }
        }
      });
    });
  </script>
@stop
