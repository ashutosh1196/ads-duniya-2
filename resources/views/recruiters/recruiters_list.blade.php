@extends('adminlte::page')

@section('title', 'Recruiters')

@section('content_header')
  <h1>Recruiters</h1>
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
            <a class="btn btn-sm btn-success float-right" href="{{ route('add_recruiter') }}">Add New Recruiter</a>
            <table id="recruiters-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Organization</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count(is_countable($recruitersList) ? $recruitersList : []); $i++) {
                  $organisation = \App\Models\Organization::where('id', $recruitersList[$i]->organization_id)->get();
                  ?>
                <tr>
                  <td>{{ $recruitersList[$i]->id }}</td>
                    <td>{{ $recruitersList[$i]->first_name }} {{ $recruitersList[$i]->last_name }}</td>
                    <td>{{ $recruitersList[$i]->email }}</td>
                    <td>{{ $recruitersList[$i]->phone_number ? $recruitersList[$i]->phone_number : '--' }}</td>
                    <td>{{ count($organisation) > 0 ? $organisation[0]->name : '--' }}</td>
                    <td>
                      <a href="view/{{$recruitersList[$i]->id}}" title="View"><i class="text-info fa fa-eye"></i></a>
                      <a title="Edit" href="edit/{{$recruitersList[$i]->id}}"><i class="text-warning fa fa-edit"></i></a>
                      <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $recruitersList[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Organization</th>
                  <th>Actions</th>
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
    $(document).ready(function() {
      $('#recruiters-list').DataTable( {
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
        console.log("ID - ", id);
        console.log("obj - ", obj);
        swal({
          title: "Are you sure?",
          text: "Are you sure you want to move this Recruiter to the Recycle Bin?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('delete_recruiter') }}",
              type: 'post',
              data: {
                id: id
              },
              dataType: "JSON",
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response) {
                console.log("response", response);
                obj.parent().parent().remove();
              }
            });
          } 
        });
      });
    });
  </script>
@stop
