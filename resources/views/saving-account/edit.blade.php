@extends('adminlte::page')

@section('title', 'Edit Saving Account Info')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Saving Account Info</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{route('saving-accounts.update')}}" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id" value="{{$saving_account->id}}">

              <div class="card-body">                
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Bank<span class="text-danger"> *</span></label>
                      <select name="bank" id="bank" class="form-control">
                        <option value="" selected="" disabled="">Select Bank</option>
                        @foreach($banks as $bank)
                        <option value="{{$bank->id}}" @if($saving_account->bank_id==$bank->id) selected @endif>{{$bank->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Name<span class="text-danger"> *</span></label>
                      <input type="text" name="name" value="{{$saving_account->name}}" class="form-control" id="name" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Account Opening Charges<span class="text-danger"> *</span></label>
                      <input type="text" name="opening_charge" class="form-control" id="opening_charge" value="{{$saving_account->opening_charge}}" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Minimum Balance<span class="text-danger"> *</span></label>
                      <input type="text" name="minimum_balance" class="form-control" id="minimum_balance" value="{{$saving_account->minimum_balance}}" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="number">Interest Rate<span class="text-danger"> *</span></label>
                      <input type="text" name="interest_rate" value="{{$saving_account->interest_rate}}" class="form-control" id="interest_rate" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="number">Apply Url<span class="text-danger"> *</span></label>
                      <input type="text" name="apply_url" value="{{$saving_account->apply_url}}" class="form-control" id="apply_url" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">More Details<span class="text-danger"> *</span></label>
                      <textarea id="content" name="content">{{$saving_account->details}}</textarea>
                      
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
          bank: {
            required: true
          },
          opening_charge: {
            required: true
          },
          minimum_balance: {
            required: true
          },
          interest_rate: {
            required: true
          },
          apply_url: {
            required: true
          },
          content: {
            required: true
          },
        },
        messages: {
          name: {
            required: "The Name is required."
          },
          bank: {
            required: "The Bank is required."
          },
          opening_charge: {
            required: "The Opening Charge is required."
          },
          minimum_balance: {
            required: "The Minimum Balance is required."
          },
          interest_rate: {
            required: "The Interest Rate is required."
          },
          apply_url: {
            required: "The Apply Url is required."
          },
          content: {
            required: "The Details is is required."
          },
        }
      });
    });
  </script>
@stop
