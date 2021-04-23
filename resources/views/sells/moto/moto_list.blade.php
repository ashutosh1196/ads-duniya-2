
 @extends('adminlte::page')

@section('title', 'Moto list')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Moto List</h3> <a class="btn btn-sm btn-success" href="{{ route('add-moto') }}">Add Moto</a>
          </div>            
          <div class="card-body">
            <!-- @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif -->
            <table style="width:100%" id="motoList" class="table table-bordered  table-hover">
              <thead>
               <tr>
                   <th>Title</th>
                   <th>Make</th>
                  <th>Model</th>
                  <th>Model Year</th>
                  
                   <th>Action</th> 
               </tr>
           </thead>
           <tfoot>
               <tr>
                   <th>Title</th>
                   <th>Make</th>
                  <th>Model</th>
                  <th>Model Year</th>
                   
                   <th>Action</th> 
               </tr>
           </tfoot>
                <tbody>
                @foreach($motoList as $list)
                 <tr>
                  <td>{{$list->title}}</td>
                    <td>{{$list->make->brand_name_en}}</td>
                    <td>{{$list->model->model_name_en}}</td>
                     <td>{{$list->vehicle_model_year}}</td>
                     
                     <td>
                    <a class="action-button" title="View" href="moto/view/{{$list->id}}"><i class="text-info fa fa-eye"></i></a>

                    <a class="action-button" title="Edit" href="{{url('admin_panel/edit-moto-details').'/'.$list->id}}"><i class="text-warning fa fa-edit"></i></a>

                     <a class="action-button delete-button" title="Delete" href="Javascript:void(0)" data-id="{{$list->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
                   </td>
               </tr>
              @endforeach
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
  <style>
  .table-bordered tr td img {
    width: 100px !important;
}
</style>
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#motoList').DataTable( {
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
        swal({
          title: "Are you sure?",
          text: "Are you sure you want to move this Make to the Recycle Bin?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('delete-inventory') }}",
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
                if(response.status == true) {
                  window.location.reload();
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
    });
  </script>
@stop
