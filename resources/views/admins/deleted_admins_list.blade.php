@extends('adminlte::page')

@section('title', 'Deleted Admins')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.deleted_admins') }}</h1>
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <table id="admins-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.email') }}</th>
                  <!-- <th>Email Verified</th> -->
                  <!-- <th>Permissions</th> -->
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count((is_countable($deletedAdmins)?$deletedAdmins:[])); $i++) { ?>
                  <tr>
                    <td>{{ $deletedAdmins[$i]->id }}</td>
                    <td>{{ $deletedAdmins[$i]->name }}</td>
                    <td>{{ $deletedAdmins[$i]->email }}</td>
                    <!-- <td>True</td> -->
                    <!-- <th>View</th> -->
                    <td>
                      <!-- <a class="action-button" title="View" href="{{ route( 'view_admin', [ 'id' => $deletedAdmins[$i]->id ] ) }}"><i class="text-info fa fa-eye"></i></a> -->
                      <a class="action-button delete-button" title="Restore" href="javascript:void(0)" data-id="{{ $deletedAdmins[$i]->id}}"><i class="text-danger fa fa-undo"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.email') }}</th>
                  <!-- <th>Email Verified</th> -->
                  <!-- <th>Permissions</th> -->
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
    $('.delete-button').click(function(e) {
      var id = $(this).attr('data-id');
      var obj = $(this);
      // console.log({id});
      swal({
        title: "Are you sure?",
        text: "Are you sure you want to restore the Admin?",
        type: "warning",
        showCancelButton: true,
      }, function(willDelete) {
        if (willDelete) {
          console.log("id", id);
          $.ajax({
            url: "{{ route('restore_admin') }}",
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
              if(response.success == 1) {
              console.log("TRUE");
                obj.parent().parent().remove();
              }
              else {
                console.log("FALSE");
                setTimeout(() => {
                alert("Something went wrong! Please try again.");
                }, 500);
                // swal("Error!", "Something went wrong! Please try again.", "error");
                // swal("Something went wrong! Please try again.");
              }
            }
          });
        } 
      });
    });
  </script>
@stop
