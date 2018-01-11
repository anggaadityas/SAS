@extends('admin.layouts.template')


@section('content')


<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Table Calon Karyawan <small>Custom design</small></h2>
      
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      <div class="table-responsive">
  <table id="datatable-checkbox listcalonkaryawan" class="table table-striped table-bordered bulk_action listcalonkaryawan">
          <thead>
            <tr>
              
              <th>No KTP </th>
              <th>Nama Lengkap </th>
              <th>Jenis Kelamin </th>
              <th>Email</th>    
              <th>No Telphone </th>        
              <th>Tanggal Daftar</th>
              <th>Posisi Pelamar</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>


      </div>

</div>
    </div>
    </div>

@endsection