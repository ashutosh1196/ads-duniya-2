@extends('adminlte::page')

@section('title', 'Mutual Funds')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Mutual Funds</h3>
            <a class="btn btn-sm btn-success" href="{{route('mutual-funds.add')}}">Add Mutual Fund</a>
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
                  <th>Name</th>
                  <th>Category</th>
                  <th>Bank</th>
                  <th>Minimum Investments</th>
                  <th>Return</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($mutual_funds as $mutual_fund)
                  <tr>
                    <td style="display:none"></td>
                    <td>{{$mutual_fund->name}}</td>
                    <td>{{$mutual_fund->category}}</td>
                    <td>{{$mutual_fund->bank->name}}</td>
                    <td>{{$mutual_fund->minimum_investment}}</td>
                    <td>{{$mutual_fund->return}}</td>
                    
                    <td>
                        <a class="action-button" title="Edit" href="{{route('mutual-funds.edit',$mutual_fund->id)}}"><i class="text-warning fa fa-edit"></i></a>
                      
                        <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{$mutual_fund->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                      
                    </td>
                  </tr>
                  @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th style="display:none"></th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Bank</th>
                  <th>Minimum Investments</th>
                  <th>Return</th>
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
        text: "Are you sure you want to delete this mutual fund info ?",
        type: "warning",
        showCancelButton: true,
      }, function(willDelete) {
        if (willDelete) {
          $.ajax({
            url: "{{route('mutual-funds.delete')}}",
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
