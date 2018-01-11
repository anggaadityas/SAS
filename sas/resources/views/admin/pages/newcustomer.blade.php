@extends('admin.layouts.template')


@section('content')


        <!-- page content -->
         <div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>List Permintaan Karyawan <small class="label label-info">Baru</small></h2>
      
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      

      <div class="col-md-12">
      <table id="datatable-checkbox requestnew" class="table table-striped table-bordered bulk_action requestnew">
          <thead>
            <tr>
              
              <th>Nama Perusahaan </th>
              <th>Kebutuhan </th>
              <th>Jenis Pekerjaan </th>
              <th>Contact Person </th>    
              <th>Status </th>        
              <th>Status Company</th>
              <th>Action</span>
              </th>
            </tr>
          </thead>
        </table>



      </div>
</div>
    </div>
    </div>
    
          </div>


<!-- Modal -->
<div id="modal-updateprog" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Request</h4>
      </div>
      <div class="modal-body" id="contentdetailreq">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection