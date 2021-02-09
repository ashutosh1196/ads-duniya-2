@extends('adminlte::page')

@section('title', 'Mobile Pages')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Mobile Pages</h3>
          </div>
          <div class="card-body">
            <!-- <a class="btn btn-success" href="add_content">Create New Page</a> -->
            <table id="pages-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Section</th>
                  <th>Status</th>
                  <!-- <th>Content</th> -->
                  <th>Created Date</th>
                  <th>Last Updated</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($mobilePagesList); $i++) { ?>
                  <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $mobilePagesList[$i]->title }}</td>
                    <td>
                      <?php
                      if($mobilePagesList[$i]->section == "terms_and_conditions") {
                        echo "Terms And Conditions";
                      }
                      else if($mobilePagesList[$i]->section == "privacy_policy") {
                        echo "Privacy Policy";
                      }
                      else if($mobilePagesList[$i]->section == "about_us") {
                        echo "About Us";
                      }
                      ?>
                    </td>
                    <td class="{{ $mobilePagesList[$i]->status == 1 ? 'text-success' : 'text-danger' }}">{{ $mobilePagesList[$i]->status == 1 ? "Active" : "Inactive" }}</td>
                    <!-- <td>
                      <?php $contentDB = strip_tags($mobilePagesList[$i]->content);
                      echo \Illuminate\Support\Str::limit($contentDB, 20)?>
                    </td> -->
                    <td>{{ date('F d, Y', strtotime($mobilePagesList[$i]->created_at)) }}</td>
                    <td>{{ date('F d, Y - H:i A', strtotime($mobilePagesList[$i]->updated_at)) }}</td>
                    <td><a class="btn btn-sm btn-success text-white" href="edit_content/<?php echo $mobilePagesList[$i]->id; ?>">Edit</a></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Section</th>
                  <th>Status</th>
                  <!-- <th>Content</th> -->
                  <th>Created Date</th>
                  <th>Last Updated</th>
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
  <style>
    .error {
      color: #ff0000 !important;
      font-weight: 500 !important;
    }
  </style>
@stop

@section('js')
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
  </script>
@stop
