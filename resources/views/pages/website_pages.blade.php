@extends('adminlte::page')

@section('title', 'Website Pages')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Website Pages</h3>
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
                <?php for ($i=0; $i < count($websitePagesList); $i++) { ?>
                  <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $websitePagesList[$i]->title }}</td>
                    <td>
                      <?php
                      if($websitePagesList[$i]->section == "terms_and_conditions") {
                        echo "Terms And Conditions";
                      }
                      else if($websitePagesList[$i]->section == "privacy_policy") {
                        echo "Privacy Policy";
                      }
                      else if($websitePagesList[$i]->section == "about_us") {
                        echo "About Us";
                      }
                      ?>
                    </td>
                    <td class="{{ $websitePagesList[$i]->status == 1 ? 'text-success' : 'text-danger' }}">{{ $websitePagesList[$i]->status == 1 ? "Active" : "Inactive" }}</td>
                    <!-- <td>
                      <?php $contentDB = strip_tags($websitePagesList[$i]->content);
                      echo \Illuminate\Support\Str::limit($contentDB, 20)?>
                    </td> -->
                    <td>{{ $websitePagesList[$i]->created_at ? date('d/m/y', strtotime($websitePagesList[$i]->created_at)) : '' }}</td>
                    <td>{{ $websitePagesList[$i]->updated_at ? date('d/m/y', strtotime($websitePagesList[$i]->updated_at)) : '' }}</td>
                    <td><a class="btn btn-sm btn-success text-white" href="edit_content/<?php echo $websitePagesList[$i]->id; ?>">Edit</a></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Section</th>  
                  <th>Status</th>
                  <!-- <th>Content</th> rgba(113, 220, 245, 0.9) -->
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
