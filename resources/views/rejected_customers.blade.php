@extends('adminlte::page')

@section('title', 'Rejected Customers')

@section('content_header')
  <h1>Rejected Customers</h1>
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
            <table id="rejected-customers-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($rejectedCustomersList); $i++) {
                  $websiteImagesPath = env("WEBSITE_URL").'companyLogos/';
                  $adminImagesPath = env("ADMIN_URL").'images/';
                  $logo = $rejectedCustomersList[$i]->logo != null ? $websiteImagesPath.$rejectedCustomersList[$i]->logo : $adminImagesPath.'avatar.png';
                  ?>
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td><img style="width:50px;" src="{{ $rejectedCustomersList[$i]->logo ? $rejectedCustomersList[$i]->logo : $logo }}" alt="{{ $rejectedCustomersList[$i]->name }}"></td>
                  <td>{{ $rejectedCustomersList[$i]->name }}</td>
                  <td>{{ $rejectedCustomersList[$i]->email }}</td>
                  <td>{{ $rejectedCustomersList[$i]->contact_number ? $rejectedCustomersList[$i]->contact_number : '--' }}</td>
                  <td>Active</td>
                  <td>
                    <a href="view/{{$rejectedCustomersList[$i]->id}}"><i class="text-info fa fa-eye"></i></a>
                    <a href="whitelist/{{$rejectedCustomersList[$i]->id}}" title="Whitelist"><i class="text-success fa fa-check-circle"></i></a>
                    <!-- <a href="edit/{{$rejectedCustomersList[$i]->id}}"><i class="text-warning fa fa-edit"></i></a> -->
                    <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $rejectedCustomersList[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Email</th>
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
      $('#rejected-customers-list').DataTable( {
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
          text: "Do you want to delete the Jobseeker?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('delete_customer') }}",
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
