
 @extends('adminlte::page')

@section('title', 'Make list')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Make List</h3> <a class="btn btn-sm btn-success" href="{{ route('add-make') }}">Add Make</a>
          </div>            
          <div class="card-body">
            <!-- @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif -->
            <table style="width:100%" id="makeList" class="table table-bordered table-hover">
              <thead>
               <tr>
                   <th>English</th>
                   <th>French</th>    
                   <th>Haitian Creole</th>
                  <th>Spanish</th>
                  <th>Brand</th>
                   <th>Action</th>  
               </tr>
           </thead>
           <tfoot>
               <tr>
                   <th>English</th>
                   <th>French</th>    
                   <th>Haitian Creole</th>
                  <th>Spanish</th>
                  <th>Brand</th>
                   <th>Action</th> 
               </tr>
           </tfoot>
                <tbody>
               @foreach($makeList as $list)
               <tr>
                   
                   <td>{{$list->brand_name_en}}</td>
                    <td>{{$list->brand_name_fr}}</td>
                    <td>{{$list->brand_name_ht}}</td>
                     <td>{{$list->brand_name_es}}</td>
                     @if($list->brand_for==0)
                      <td>
                        Car
                      </td>
                      @endif
                      @if($list->brand_for==1)
                      <td>
                        Moto
                      </td>
                      @endif
                      @if($list->brand_for==2)
                      <td>
                        Power Equipment
                      </td>
                      @endif
                      @if($list->brand_for==3)
                      <td>
                        Auto and Moto Parts
                      </td>
                      @endif
                   <td>
                    <a class="action-button" title="View" href="makeview/{{$list->id}}"><i class="text-info fa fa-eye"></i></a>

                    <a class="action-button" title="Edit" href="editmake/{{$list->id}}"><i class="text-warning fa fa-edit"></i></a>

                     <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $list->id}}"><i class="text-danger fa fa-trash-alt"></i></a>
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
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#makeList').DataTable( {
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
              url: "{{ route('delete_make') }}",
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
                  }, 500);
                  // swal("Error!", "Something went wrong! Please try again.", "error");
                  // swal("Something went wrong! Please try again.");
                }
              }
            });
          } 
        });
      });
    });
  </script>
@stop
