@extends('adminlte::page')

@section('title', 'Edit Demat Info')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Demat Info</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{route('demats.update')}}" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id" value="{{$demat->id}}">

              <div class="card-body">                
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Name<span class="text-danger"> *</span></label>
                      <input type="text" name="name" value="{{$demat->name}}" class="form-control" id="name" maxlength="100">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Exchange<span class="text-danger"> *</span></label>
                      <input type="text" name="exchange" value="{{$demat->exchange}}" class="form-control" id="exchange" maxlength="100">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Bank<span class="text-danger"> *</span></label>
                      <select name="bank_id" id="bank_id" class="form-control">
                        <option>Select Bank</option>
                        @foreach($banks as $bank)
                        <option value="{{$bank->id}}" @if($bank->id==$demat->bank_id) selected @endif>{{$bank->name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Trading Account Opening Fee<span class="text-danger"> *</span></label>
                      <input type="text" name="trading_account_opening_fee" value="{{$demat->trading_account_opening_fee}}" class="form-control" id="trading_account_opening_fee" maxlength="100">                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Demat Account Opening Fee<span class="text-danger"> *</span></label>
                      <input type="text" name="demat_account_opening_fee" value="{{$demat->demat_account_opening_fee}}" class="form-control" id="demat_account_opening_fee" maxlength="100">                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="apply_url">Apply Url<span class="text-danger"> *</span></label>
                      <input type="text" name="apply_url" value="{{$demat->apply_url}}" class="form-control" id="apply_url" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">More Details<span class="text-danger"> *</span></label>
                      <textarea id="content" name="content">{{$demat->details}}</textarea>
                      
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
          exchange: {
            required: true,
          },
          bank_id: {
            required: true,
          },
          trading_account_opening_fee: {
            required: true,
          },
          demat_account_opening_fee: {
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
            required: "The Name is required."
          },
          exchange: {
            required: "The Exchange is required."
          },
          bank_id: {
            required: "The Bank is required."
          },
          trading_account_opening_fee: {
            required: "The Trading Account Opening Fee is required."
          },
          demat_account_opening_fee: {
            required: "The Demat Account Opening Fee is required."
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
