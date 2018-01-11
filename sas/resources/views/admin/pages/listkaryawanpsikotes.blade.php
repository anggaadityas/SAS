@extends('admin.layouts.template')

@section('content')

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>List Karyawan <span class="small">yang telah mengikuti UJIAN TES & INTERVIEW</span></h2>

            <div class="clearfix"></div>
        </div>

        <div class="x_content">


            <div class="table-responsive">
            
            <table id="datatable-checkbox listkaryawanpsikotes" class="table table-striped table-bordered bulk_action listkaryawanpsikotes">
          <thead>
            <tr>           
              <th>No KTP </th>
              <th>Nama Lengkap </th>
              <th>Kode Ujian</th>
              <th>Kode Interview</th>    
              <th>Hasil </th>  
              <th>Action</th>
            </tr>
          </thead>
        </table>

            </div>
        </div>

        
    </div>
</div>


@endsection
