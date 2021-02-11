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
          <a class="btn btn-sm btn-success float-right" href="{{ url()->previous() }}">Back</a>
            <h3>Add Role</h3>
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
                  <label for="role_name">Role Name</label>
                  <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Enter Title">
                  @if($errors->has('role_name'))
                    <div class="error">{{ $errors->first('role_name') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="permissions">Permission(s)</label>
                  <br/>
                  <input type="checkbox" name="permissions" value="list" id="permissions" > List Data<br/>
                  <input type="checkbox" name="permissions" value="add" id="permissions" > Add Data<br/>
                  <input type="checkbox" name="permissions" value="edit" id="permissions" > Edit Data<br/>
                  <input type="checkbox" name="permissions" value="delete" id="permissions" > Delete Data
                  @if($errors->has('permissions'))
                    <div class="error">{{ $errors->first('permissions') }}</div>
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
            required: "Role Name is Required"
          },
          permissions: {
            required: "Permission is Required",
          }
        }
      });
    });
  </script>
@stop
