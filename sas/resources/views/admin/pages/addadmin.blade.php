@extends('admin.layouts.template')


@section('content')


  <!-- page content -->
         <div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>List Admin <small class="label label-info">info</small></h2>
      
      <div class="clearfix"></div>
    </div>

    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-adduser"><i class="fa fa-address-card-o" aria-hidden="true"></i><strong> Add User </strong></a>


    <div class="x_content">

      

      <div class="col-md-12">
      <table id="datatable-checkbox listadmin" class="table table-striped table-bordered bulk_action listadmin">
          <thead>
            <tr>
              
              <th>Nama User </th>
              <th>Email </th>            
              <th>Role Akses </th> 
              <th>Status </th>   
              <th>Created Date </th> 
              <th>Created By</th>       
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

              <!-- Modal Add User -->
<div id="modal-adduser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
        				

  <div class="form-group">
    <label class="col-sm-3 control-label">Nama Depan :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Nama Depan" name="namadepan" id="namadepan">
        <input type="hidden" class="form-control" id="id">
    </div>
  </div>   

  <div class="form-group">
    <label class="col-sm-3 control-label">Nama Belakang :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Nama Belakang" name="namabelakang" id="namabelakang">
    </div>
  </div>   		

  <div class="form-group">
    <label class="col-sm-3 control-label">Email :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Email" name="email" id="email">
    </div>
  </div>   

    <div class="form-group">
    <label class="col-sm-3 control-label">Role Akses :</label>
    <div class="col-sm-8">
      <select name="role" id="role" class="form-control">
      	<option value='0'>-- PILIH --</option>
      	<option value='1'>Admin</option>
      	<option value='2'>HRD</option>
      	<option value='3'>Sales</option>
      	<option value='4'>User</option>
      </select>
    </div>
  </div>  

  <div class="form-group">
    <label class="col-sm-3 control-label">Password :</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" placeholder="Password" name="password" id="password">
    </div>
  </div>  

  <div class="form-group">
    <label class="col-sm-3 control-label">Status :</label>
    <div class="col-sm-8">
      <select name="status" id="status" class="form-control">
      	<option value='0'>-- PILIH --</option>
      	<option value='1'>Active</option>
      	<option value='0'>Non Active</option>
      </select>
    </div>
  </div>     

       	</div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success prosesadduser">Proses</button>
      </div>
    </div>

  </div>
</div>






<!-- Modal Edit User -->
<div id="modal-edituser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit User</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
        				

  <div class="form-group">
    <label class="col-sm-3 control-label">Nama Depan :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Nama Depan" name="namadepan" id="nama_depan">
        <input type="hidden" class="form-control" id="id">
    </div>
  </div>   

  <div class="form-group">
    <label class="col-sm-3 control-label">Nama Belakang :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Nama Belakang" name="namabelakang" id="nama_belakang">
    </div>
  </div>   		

  <div class="form-group">
    <label class="col-sm-3 control-label">Email :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Email" name="email" id="email_user">
    </div>
  </div>   

    <div class="form-group">
    <label class="col-sm-3 control-label">Role Akses :</label>
    <div class="col-sm-8">
      <select name="role" id="role" class="form-control">
      	<option value='0'>-- PILIH --</option>
      	<option value='1'>Admin</option>
      	<option value='2'>HRD</option>
      	<option value='3'>Sales</option>
      	<option value='4'>User</option>
      </select>
    </div>
  </div>  

  <div class="form-group">
    <label class="col-sm-3 control-label">Status :</label>
    <div class="col-sm-8">
      <select name="status" id="status" class="form-control">
      	<option value='0'>-- PILIH --</option>
      	<option value='1'>Active</option>
      	<option value='0'>Non Active</option>
      </select>
    </div>
  </div>     

       	</div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success prosesedituser">Proses</button>
      </div>
    </div>

  </div>
</div>

@endsection