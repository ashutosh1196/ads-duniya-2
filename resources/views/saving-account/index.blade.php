@extends('adminlte::page')

@section('title', 'Saving Accounts Info')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Saving Accounts Info</h3>
            <a class="btn btn-sm btn-success" href="{{route('saving-accounts.add')}}">Add Saving Account Info</a>
          </div>           
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <table style="width:100%" id="admins-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="display:none"></th>
                  <th>Bank</th>
                  <th>Name</th>
                  <th>Account Opening Charge</th>
                  <th>Minimum Balance</th>
                  <th>Interest Rate</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($saving_accounts as $saving_account)
                  <tr>
                    <td style="display:none"></td>
                    <td>{{@$saving_account->bank->name}}</td>
                    <td>{{$saving_account->name}}</td>
                    <td>{{$saving_account->opening_charge}}</td>
                    <td>{{$saving_account->minimum_balance}}</td>
                    <td>{{$saving_account->interest_rate}}</td>
                    <td>

                        <a class="action-button" title="Edit" href="{{route('saving-accounts.edit',$saving_account->id)}}"><i class="text-warning fa fa-edit"></i></a>
                        
                        <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{$saving_account->id}}"><i class="text-danger fa fa-trash-alt"></i></a>

                    </td>
                  </tr>
                  @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th style="display:none"></th>
                  <th>Bank</th>
                  <th>Name</th>
                  <th>Account Opening Charge</th>
                  <th>Minimum Balance</th>
                  <th>Interest Rate</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $('#admins-list').DataTable( {
      columnDefs: [ {
        targets: 0,
        render: function ( data, type, row ) {
          return data.substr( 0, 2 );
        }
      }]
    });

    // $('.delete-button').click(function(e) {
    $(document).on('click','.delete-button',function(e){  
      var id = $(this).attr('data-id');
      var obj = $(this);

      swal({
        title: "Are you sure?",
        text: "Are you sure you want to delete this saving account info ?",
        type: "warning",
        showCancelButton: true,
      }, function(willDelete) {
        if (willDelete) {
          $.ajax({
            url: "{{route('saving-accounts.delete')}}",
            type: 'post',
            data: {
              id: id
            },
            dataType: "JSON",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              console.log("Response", response);
              if(response.status) {
                obj.parent().parent().remove(); 
              }
              else {
                console.log("FALSE");
                setTimeout(() => {
                alert("Something went wrong! Please try again.");
                }, 500);
              }
            }
          });
        } 
      });
    });
  </script>
@stop
