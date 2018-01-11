@extends('admin.layouts.template')


@section('content')

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Table Schedule Psikotes</h2>
      
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      <div class="table-responsive">
  <table id="datatable-checkbox listschedulepsikotes" class="table table-striped table-bordered bulk_action listschedulepsikotes">
          <thead>
            <tr>           
              <th>No KTP </th>
              <th>Nama Lengkap </th>
              <th>Kode Test</th>
              <th>Tanggal Ujian</th>    
              <th>Status </th>        
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