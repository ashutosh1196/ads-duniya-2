@extends('adminlte::page')

@section('title', 'Edit Loan Info')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Edit Loan Info</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addAdminForm" method="post", action="{{route('loans.update')}}" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id" value="{{$loan->id}}">

              <div class="card-body">                
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Bank<span class="text-danger"> *</span></label>
                      <select name="bank" id="bank" class="form-control">
                        <option value="" selected="" disabled="">Select Bank</option>
                        @foreach($banks as $bank)
                        <option value="{{$bank->id}}" @if($loan->bank_id==$bank->id) selected @endif>{{$bank->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Name<span class="text-danger"> *</span></label>
                      <input type="text" name="name" value="{{$loan->name}}" class="form-control" id="name" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Type<span class="text-danger"> *</span></label>
                      <select name="type" id="type" class="form-control">
                        <option value="" selected="" disabled="">Select Loan Type</option>
                        @foreach(\App\Models\Loan::LOANS as $loan_)
                        <option value="{{$loan_}}" @if($loan_==$loan->type) selected @endif>{{ucfirst($loan_)}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="interest_rate">Interest Rate<span class="text-danger"> *</span></label>
                      <input type="text" value="{{$loan->interest_rate}}" name="interest_rate" class="form-control" id="interest_rate" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Processing Fee<span class="text-danger"> *</span></label>
                      <input type="text" value="{{$loan->processing_fee}}" name="processing_fee" class="form-control" id="processing_fee" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Tenure Range<span class="text-danger"> *</span></label>
                      <input type="text" value="{{$loan->tenure_range}}" name="tenure_range" class="form-control" id="tenure_range" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="number">Apply Url<span class="text-danger"> *</span></label>
                      <input type="text" name="apply_url" value="{{$loan->apply_url}}" class="form-control" id="apply_url" maxlength="100">
                      
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">More Details<span class="text-danger"> *</span></label>
                      <textarea id="content" name="content">{{$loan->details}}</textarea>
                      
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
