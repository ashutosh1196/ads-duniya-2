@extends('adminlte::page')

@section('title', 'Deleted Recruiters')

@section('content_header')
  <h1>Deleted Recruiters</h1>
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
            <table id="deleted-recruiters-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Organization</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count(is_countable($deletedRecruiters)?$deletedRecruiters:[]); $i++) {
                  $organisation = \App\Models\Organization::where('id', $deletedRecruiters[$i]->organization_id)->get();
                  ?>
                <tr>
                  <td>{{ $deletedRecruiters[$i]->id }}</td>
                    <td>{{ $deletedRecruiters[$i]->name }}</td>
                    <td>{{ $deletedRecruiters[$i]->email }}</td>
                    <td>{{ $deletedRecruiters[$i]->phone_number ? $deletedRecruiters[$i]->phone_number : '--' }}</td>
                    <td>{{ count($organisation) > 0 ? $organisation[0]->name : '--' }}</td>
                    <td>Active</td>
                    <td>
                      <a href="view/{{$deletedRecruiters[$i]->id}}" title="View"><i class="text-info fa fa-eye"></i></a>
                      <a style="margin-left:5px;" class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $deletedRecruiters[$i]->id}}"><i class="text-danger fa fa-undo"></i></a>
                    </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Organization</th>
                  <th>Status</th>
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
      $('#deleted-recruiters-list').DataTable( {
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
          text: "Do you want to restore the Jobseeker?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('restore_recruiter') }}",
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
