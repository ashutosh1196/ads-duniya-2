@extends('adminlte::page')

@section('title', 'Whitelisted Customers')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.whitelisted_customers') }}</h1>
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
            <!-- <a class="btn btn-sm btn-success float-right" href="{{ route('add_customer') }}">Add New Customer</a> -->
            <table id="whitelisted-customers-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <!-- <th>Logo</th> -->
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.email') }}</th>
                  <th>{{ __('adminlte::adminlte.contact_number') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($whitelistedCustomersList); $i++) {
                  $websiteImagesPath = config('adminlte.website_url').'companyLogos/';
                  $defaultImage = config('adminlte.default_avatar');
                  $logo = $whitelistedCustomersList[$i]->logo != null ? $websiteImagesPath.$whitelistedCustomersList[$i]->logo : $defaultImage;
                  ?>
                <tr>
                  <td>{{ $i+1 }}</td>
                  <!-- <td><img src="{{ $logo }}" alt="{{ $whitelistedCustomersList[$i]->name }}"></td> -->
                  <td>{{ $whitelistedCustomersList[$i]->name }}</td>
                  <td>{{ $whitelistedCustomersList[$i]->email }}</td>
                  <td>{{ $whitelistedCustomersList[$i]->contact_number ? $whitelistedCustomersList[$i]->contact_number : '--' }}</td>
                  <td>
                  <a href="whitelisted/view/{{$whitelistedCustomersList[$i]->id}}"><i class="text-info fa fa-eye"></i></a>
                    <a href="reject/{{$whitelistedCustomersList[$i]->id}}" title="Reject"><i class="text-danger fa fa-times-circle"></i></a>
                    <a href="whitelisted/edit/{{$whitelistedCustomersList[$i]->id}}" title="Edit"><i class="text-warning fa fa-edit"></i></a>
                    <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $whitelistedCustomersList[$i]->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <!-- <th>Logo</th> -->
                  <th>{{ __('adminlte::adminlte.name') }}</th>
                  <th>{{ __('adminlte::adminlte.email') }}</th>
                  <th>{{ __('adminlte::adminlte.contact_number') }}</th>
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
          text: "Are you sure you want to move this Customer to the Recycle Bin?",
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
                window.location.reload();
                /* console.log("response", response);
                obj.parent().parent().remove(); */
              }
            });
          }
        });
      });
    });
  </script>
@stop
