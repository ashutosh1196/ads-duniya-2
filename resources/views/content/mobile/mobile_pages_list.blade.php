@extends('adminlte::page')

@section('title', 'Mobile Pages')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Mobile Pages</h3>
            @can('add_mobile_page')<a class="btn btn-success" href="{{ route('add_mobile_page') }}">Create Mobile Page</a>@endcan
          </div>
          <div class="card-body">
            <table id="pages-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Section</th>
                  <th>Status</th>
                  @can('manage_mobile_pages_actions')<th>Actions</th>@endcan
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($mobilePagesList); $i++) { ?>
                  <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $mobilePagesList[$i]->title }}</td>
                    <td>{{ $mobilePagesList[$i]->section }}</td>
                    <td class="{{ $mobilePagesList[$i]->status == 'active' ? 'text-success' : 'text-danger' }}">{{ $mobilePagesList[$i]->status == 'active' ? "Active" : "Inactive" }}</td>
                    @can('manage_mobile_pages_actions')
                      <td>
                        @can('view_mobile_page')
                          <a href="{{ route('view_mobile_page', ['id' => $mobilePagesList[$i]->id]) }}" title="View"><i class="text-info fa fa-eye"></i></a>
                        @endcan
                        @can('edit_mobile_page')
                          <a href="{{ route('edit_mobile_page', ['id' => $mobilePagesList[$i]->id]) }}" title="Edit"><i class="text-warning fa fa-edit"></i></a>
                        @endcan
                        @can('delete_mobile_page')
                          <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $mobilePagesList[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                        @endcan
                      </td>
                    @endcan
                  </tr>
                <?php } ?>
              </tbody>
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
    $('#pages-list').DataTable( {
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
      console.log(id);
      swal({
        title: "Are you sure?",
        text: "Are you sure you want to move this Page to the Recycle Bin?",
        type: "warning",
        showCancelButton: true,
      }, function(willDelete) {
        if (willDelete) {
          $.ajax({
            url: "{{ route('delete_mobile_page') }}",
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
                window.location.reload();
                /* console.log("response", response);
                obj.parent().parent().remove(); */
              }
              else {
                console.log("FALSE");
                setTimeout(() => {
                  alert("Something went wrong! Please try again.");
                  // swal("Error!", "Something went wrong! Please try again.", "error");
                }, 500);
              }
            }
          });
        } 
      });
    });
  </script>
@stop
