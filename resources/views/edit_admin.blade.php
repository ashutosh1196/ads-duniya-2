@extends('adminlte::page')

@section('title', 'Edit Admin')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">Back</a>
            <h3>Edit Admin</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="updateAdminForm" method="post" action="{{ route('update_admin') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $admin[0]->id }}">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{ $admin[0]->name }}">
                      @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" id="email" value="{{ $admin[0]->email }}">
                      @if($errors->has('email'))
                        <div class="error">{{ $errors->last('email') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-6">               
                    <div class="form-group">
                      <label for="role_id">Role</label>
                      <select name="role_id" class="form-control" id="role_id">
                        <?php for ($i=0; $i < count($roles); $i++) { ?> 
                          <option value="{{ $roles[$i]->id }}">{{ $roles[$i]->name }}</option>
                        <?php } ?>
                      </select>
                      @if($errors->has('role_id'))
                        <div class="error">{{ $errors->last('role_id') }}</div>
                      @endif
                    </div>
                  </div>
               </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary">Submit</button>
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
      $('#updateAdminForm').validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
        },
        messages: {
          name: {
            required: "Name is Required"
          },
          email: {
            required: "Email is Required",
            email: "Please enter a valid Email"
          },
        }
      });
    });
  </script>
@stop
