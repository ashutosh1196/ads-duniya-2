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

                <div class="information_fields">
                  <input type="hidden" name="company_id" class="form-control" id="company_id" value="{{ $company_id }}">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="amount">{{ __('adminlte::adminlte.amount') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="amount" class="form-control" id="amount">
                        <div id ="function_error" class="error"></div>
                        @if($errors->has('amount'))
                          <div class="error">{{ $errors->first('amount') }}</div>
                        @endif
                      </div>
                    </div>
                    
                    <!-- <div class="col-sm-6">
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
                    
                  <div class="row"> -->
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
                    </div>

                  </div>
                </div>

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
@stop

@section('js')
  <script>
    $(document).ready(function() {
      $('#addCompanyCreditForm').validate({
        ignore: [],
        debug: false,
        rules: {
          organization_id: {
            required: true,
          },
          amount: {
            required: true,
            number: true
          },
          status: {
            required: true
          },
        },
        messages: {
          organization_id: {
            required: "The Organization field is required."
          },
          amount: {
            required: "The Credit Amount field is required.",
            number: "The Credit Amount must be in numbers only."
          },
          status: {
            required: "The Status field is required."
          },
        }
      });
    });
  </script>
@stop
