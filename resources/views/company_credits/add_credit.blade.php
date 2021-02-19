@extends('adminlte::page')

@section('title', 'Add Company Credit')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>{{ __('adminlte::adminlte.add_company_credit') }}</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addCompanyCreditForm" method="post" action="{{ route('save_company_credit') }}">
              @csrf
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-warning">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <!-- <div class="information_fields"> -->
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="total_credits">{{ __('adminlte::adminlte.credit_amount') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="total_credits" class="form-control" id="total_credits">
                        <div id ="function_error" class="error"></div>
                        @if($errors->has('total_credits'))
                          <div class="error">{{ $errors->first('total_credits') }}</div>
                        @endif
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="organization_id">{{ __('adminlte::adminlte.company') }}<span class="text-danger"> *</span></label>
                        <select name="organization_id" class="form-control" id="organization_id">
                          @for ($i=0; $i < count($organizations); $i++) {  ?>
                            <option value="{{ $organizations[$i]->id }}">{{ $organizations[$i]->name }}</option>
                          @endfor
                        </select>
                        <div id ="function_error" class="error"></div>
                        @if($errors->has('organization_id'))
                          <div class="error">{{ $errors->first('organization_id') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                    
                  <!-- <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="status">{{ __('adminlte::adminlte.status') }}<span class="text-danger"> *</span></label>
                        <select amount="status" class="form-control" id="status">
                          <option value="1">{{ __('adminlte::adminlte.active') }}</option>
                          <option value="0">{{ __('adminlte::adminlte.inactive') }}</option>
                        </select>
                        @if($errors->has('status'))
                          <div class="error">{{ $errors->first('status') }}</div>
                        @endif
                      </div>
                    </div> -->

                  <!-- </div> -->
                <!-- </div> -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary" >{{ __('adminlte::adminlte.save') }}</button>
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
    label.button-label {
      position: relative;
      left: -20px;
    }
  </style>
@stop

@section('js')
  <script>
    $(document).ready(function() {
      $('#addCompanyCreditForm').validate({
        ignore: [],
        debug: false,
        rules: {
          total_credits: {
            required: true,
            number: true
          }
        },
        messages: {
          total_credits: {
            required: "The Credit total_credits field is required.",
            number: "The Credit total_credits must be in numbers only."
          }
        }
      });
    });
  </script>
@stop
