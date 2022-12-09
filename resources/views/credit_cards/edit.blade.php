@extends('adminlte::page')

@section('title', 'AddEdit Credit Card')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Credit Card</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{route('credit-cards.update')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">                
                <div class="row">

                  <input type="hidden" name="id" value="{{$credit_card->id}}">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Name<span class="text-danger"> *</span></label>
                      <input type="text" name="name" value="{{$credit_card->name}}" class="form-control" id="name" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Type<span class="text-danger"> *</span></label>
                      <select name="type" id="type" class="form-control">
                        <option>Select Card Type</option>
                        @foreach($types as $type)
                        <option value="{{$type->id}}" @if($credit_card->type==$type->id) selected @endif>{{$type->name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Bank<span class="text-danger"> *</span></label>
                      <select name="bank_id" id="bank_id" class="form-control">
                        <option>Select Bank</option>
                        @foreach($banks as $bank)
                        <option value="{{$bank->id}}" @if($credit_card->bank_id==$bank->id) selected @endif>{{$bank->name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Joining Fee<span class="text-danger"> *</span></label>
                      <input type="text" value="{{$credit_card->joining_fee}}" name="joining_fee" class="form-control" id="joining_fee" maxlength="100">                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Annual Fee<span class="text-danger"> *</span></label>
                      <input type="text" value="{{$credit_card->annual_fee}}" name="annual_fee" class="form-control" id="annual_fee" maxlength="100">                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="apply_url">Apply Url<span class="text-danger"> *</span></label>
                      <input type="text" value="{{$credit_card->apply_url}}" name="apply_url" class="form-control" id="apply_url" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Status<span class="text-danger"> *</span></label>
                      <select name="status" id="status" class="form-control">
                        <option>Status</option>
                        
                        <option value="1" @if($credit_card->status==1) selected @endif>Active</option>
                        <option value="0" @if($credit_card->status==0) selected @endif>Inactive</option>
                        
                      </select>
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Image</label>
                      <input type="file" name="image" class="form-control" id="image" maxlength="100">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <img src="{{asset('credit-cards/'.$credit_card->image)}}" id="preview" style="width:50%">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">More Details<span class="text-danger"> *</span></label>
                      <textarea id="content" name="content">{{$credit_card->details}}</textarea>
                      
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
          type: {
            required: true,
          },
          bank_id: {
            required: true,
          },
          joining_fee: {
            required: true,
          },
          annual_fee: {
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
          type: {
            required: "The Card Type is required."
          },
          bank_id: {
            required: "The Bank is required."
          },
          joining_fee: {
            required: "The Joining Fee is required."
          },
          annual_fee: {
            required: "The Annual Fee is required."
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

    $(document).on('change','#image',function(){
      
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('preview');
          output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
      
    })
  </script>
@stop
