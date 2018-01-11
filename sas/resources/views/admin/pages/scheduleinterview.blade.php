@extends('admin.layouts.template')


@section('content')


<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Table Schedule Interview</h2>
      
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      <div class="table-responsive">
  <table id="datatable-checkbox listscheduleinterview" class="table table-striped table-bordered bulk_action listscheduleinterview">
          <thead>
            <tr>           
              <th>No KTP </th>
              <th>Nama Lengkap </th>
              <th>Kode Interview</th>
              <th>Tanggal Interview</th>    
              <th>Detail </th>  
              <th>Status</th>      
              <th>Kode Admin</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>


      </div>

</div>
    </div>
    </div>

@endsection