@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>{{ __('adminlte::adminlte.roles') }}</h3>
          </div>
          <div class="card-body">
            <a class="btn btn-sm btn-success float-right clear" href="add">Create New Role</a>
            <table id="roles-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <!-- <th>#</th> -->
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.permissions') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($roles); $i++) { ?>
                  <tr>
                    <!-- <td>{{ $i+1 }}</td> -->
                    <td>{{ $roles[$i]->name }}</td>
                    <td>{{ $roles[$i]->permissions }}</td>
                    <td>
                      <a class="btn btn-sm btn-success text-white" href="#">Edit</a>
                      <a class="btn btn-sm btn-danger text-white" title="Delete Role" href="javascript:void(0)" id="delete-button" data-id="{{ $roles[$i]->id}}">Delete</a> 
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <!-- <th>#</th> -->
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.permissions') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
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
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script>
    $('#roles-list').DataTable( {
      columnDefs: [ {
        targets: 0,
        render: function ( data, type, row ) {
          return data.substr( 0, 2 );
        }
      }]
    });

    $('#delete-button').click(function(e) {
      var id = $(this).attr('data-id');
      console.log("ID - ", id);
      var obj = $(this);
      console.log("obj - ", obj);
      e.preventDefault();
      swal({
        title: "Are you sure you want to delete Role?",
        text: "",
        icon: "warning",
        buttons:{
          confirm: {
            text : 'Yes',
            className : 'btn btn-success'
          },
          cancel: {
            visible: true,
            className: 'btn btn-danger'
          }
        },
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url:"{{url('delete_role')}}",
            type:'post',
            data:{
              id:id
            },
            dataType: "JSON",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
              window.location.reload();
              /* console.log("response", response);
              obj.parent().parent().remove(); */
            }
          });
        } 
      });
    });
  </script>
@stop
