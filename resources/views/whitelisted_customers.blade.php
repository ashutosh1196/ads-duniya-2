@extends('adminlte::page')

@section('title', 'Whitelisted Customers')

@section('content_header')
  <h1>Whitelisted Customers</h1>
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
            <table id="whitelisted-customers-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($whitelistedCustomersList); $i++) {
                  $websiteImagesPath = env("WEBSITE_URL").'companyLogos/';
                  $adminImagesPath = env("ADMIN_URL").'images/';
                  $logo = $whitelistedCustomersList[$i]->logo != null ? $websiteImagesPath.$whitelistedCustomersList[$i]->logo : $adminImagesPath.'avatar.png';
                  ?>
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td><img style="width:50px;" src="{{ $whitelistedCustomersList[$i]->logo ? $whitelistedCustomersList[$i]->logo : $logo }}" alt="{{ $whitelistedCustomersList[$i]->name }}"></td>
                  <td>{{ $whitelistedCustomersList[$i]->name }}</td>
                  <td>{{ $whitelistedCustomersList[$i]->email }}</td>
                  <td>{{ $whitelistedCustomersList[$i]->contact_number ? $whitelistedCustomersList[$i]->contact_number : '--' }}</td>
                  <td>
                  <a href="view/{{$whitelistedCustomersList[$i]->id}}"><i class="text-info fa fa-eye"></i></a>
                    <a style="margin-left:5px;" href="reject/{{$whitelistedCustomersList[$i]->id}}" title="Reject"><i class="text-danger fa fa-times-circle"></i></a>
                    <!-- <a style="margin-left:5px;" href="edit/{{$whitelistedCustomersList[$i]->id}}"><i class="text-warning fa fa-edit"></i></a> -->
                    <a style="margin-left:5px;" class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $whitelistedCustomersList[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
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
                  <th>Phone Number</th>
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
      $('#whitelisted-customers-list').DataTable( {
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
          text: "Do you want to delete the Customer?",
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
