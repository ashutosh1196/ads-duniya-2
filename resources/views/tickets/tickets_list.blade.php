@extends('adminlte::page')

@section('title', 'Tickets')

@section('content_header')
  <h1>{{ __('adminlte::adminlte.tickets') }}</h1>
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
            <table id="tickets-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <!-- <th>#</th> -->
                  <th>{{ __('adminlte::adminlte.company') }}</th>
                  <th>{{ __('adminlte::adminlte.recruiter_name') }}</th>
                  <th>{{ __('adminlte::adminlte.subject') }}</th>
                  <th>{{ __('adminlte::adminlte.status') }}</th>
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count(is_countable($ticketsList) ? $ticketsList : []); $i++) {
                  $recruiter = \App\Models\Recruiter::where('id', $ticketsList[$i]->recruiter_id)->get();
                  $organisation = \App\Models\Organization::where('id', $recruiter[0]->organization_id)->get();
                  ?>
                <tr>
                  <!-- <td>{{ $i+1 }}</td> -->
                  <td>{{ $organisation[0]->name }}</td>
                  <td>{{ $recruiter[0]->name }}</td>
                  <td>{{ $ticketsList[$i]->subject }}</td>
                  <td class="{{ $ticketsList[$i]->status == 'open' ? 'text-success' : 'text-danger' }}">{{ $ticketsList[$i]->status == 'open' ? 'Open' : 'Closed' }}</td>
                  <td>
                    <a href="view/{{$ticketsList[$i]->id}}" title="View"><i class="text-info fa fa-eye"></i></a>
                    <?php if($ticketsList[$i]->status == 'open') { ?>
                    <a class="action-button close-ticket-button" title="Close" href="javascript:void(0)" data-id="{{ $ticketsList[$i]->id}}"><i class="text-success fas fa-door-closed"></i></a>
                    <?php } else { ?>
                    <a class="action-button open-ticket-button" title="Open" href="javascript:void(0)" data-id="{{ $ticketsList[$i]->id}}"><i class="text-danger fas fa-door-open"></i></a>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <!-- <th>#</th> -->
                  <th>{{ __('adminlte::adminlte.company') }}</th>
                  <th>{{ __('adminlte::adminlte.recruiter_name') }}</th>
                  <th>{{ __('adminlte::adminlte.subject') }}</th>
                  <th>{{ __('adminlte::adminlte.status') }}</th>
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
      $('#tickets-list').DataTable( {
        columnDefs: [ {
          targets: 0,
          render: function ( data, type, row ) {
            return data.substr( 0, 2 );
          }
        }]
      });
      $('.close-ticket-button').click(function(e) {
        var id = $(this).attr('data-id');
        var obj = $(this);
        console.log("ID - ", id);
        swal({
          title: "Are you sure?",
          text: "Are you sure you want to close this Ticket?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('close_ticket') }}",
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
      $('.open-ticket-button').click(function(e) {
        var id = $(this).attr('data-id');
        var obj = $(this);
        console.log("ID - ", id);
        swal({
          title: "Are you sure?",
          text: "Are you sure you want to open this Ticket?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{ route('open_ticket') }}",
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
