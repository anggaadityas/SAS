@extends('admin.layouts.template')


@section('content')

	<div class="col-md-5">

                    <form action="{{ route('InsertGaleryProses') }}" class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST">

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="nama_user" value="{{ session('username') }}">

            
            <div class="alert alert-danger print-error-msg" style="display:none">
				        <ul></ul>
				    </div>

            @if(Session::has('alert-success'))
            <div class="alert alert-success">
              {{ Session::get('alert-success') }}
            </div>
            @endif


               <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Galery :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="nama_galery" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">images Galery :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12" >

                          <img id='imgGalery' width="200" height="190" class="img-circle" style="display:none;"><br><br>

                           <label class="btn btn-primary" id=uploadfileGalery>
				                Choose Galery <input type="file" id="ChooseImageGalery" accept="image/*" capture="camera" class="form-control col-md-7 col-xs-12" name="images_galery" style="display: none;">
				            </label>

				            <button type="button" class="btn btn-danger" onclick="clearImageGalery()" style=display:none; id="ClearImagesGalery"><strong>Clear Image</strong></button>
                        
                        </div>

                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="id_kategori" class="form-control">
                         	<option value="">-- Pilih --</option>
                         	@foreach($kategori as $kateg)
                         	<option value="{{ $kateg->id_kategori }}">{{ $kateg->nama_kategori }}</option>
                         	@endforeach
                         </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sort Galery :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="sort_galery" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off" name="middle-name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Active Galery :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="active_galery" class="form-control col-md-7 col-xs-12">
                        	<option value="">-- Pilih --</option>
                        	<option value="Active">Active</option>
                        	<option value="Non Active">Non Active</option>
                        </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button class="btn btn-primary" type="reset">Reset</button>
                             <button class="btn btn-success upload-imagegalery" type="submit">Save</button>
                        </div>
                      </div>

                    </form>

                    </div>


            <div class="col-md-7" style="margin-top:40px;">

                    <table id="datatable-checkbox datagaleri" class="table table-striped table-bordered bulk_action datagaleri">
                      <thead>
                        <tr>
                          <th>Nama Galery</th>
                          <th>Images Galery</th>
                          <th>Sort Galery</th>
                          <th>Status Galery</th>
                          <th>Kategori Galery</th>
                          <th>Create Galery</th>
                          <th>Modif Galery</th>
                          <th>User Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    </table>


              </div>




        <!-- Modal Edit Slider -->


        <div id="ModalEditGalery" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
               

                 <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" id="myFormGalery">

                      <input type="hidden" name="nama_user" id="nama_user" value="{{ session('username') }}">
                      <input type="hidden" id="id_galery" name="id_galery">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">


               <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Galery :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="nama_galery" id="nama_galery" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">images galery :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12" >

                        <img id='EditShowimgGalery' width="200" height="190" class="img-circle" style="display:none;"><br><br>


                    <img src="#" id="images_galery" name="EditimageGalery" width="200" height="190" class="img-circle">
                    <br><br>

                    <label class="btn btn-primary" id=EditUploadfileGalery>
                        Choose Galery <input type="file" id="EditChooseImageGalery" accept="image/*" capture="camera" class="form-control col-md-7 col-xs-12" name="EditChooseImageGalery" style="display: none;">
                    </label>

                    <button type="button" class="btn btn-danger" onclick="EditclearImageGalery()" style=display:none; id="EditClearGalery"><strong>Clear Image</strong></button>
                        
                        </div>

                      </div>

                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="id_kategori" class="form-control">
                         	<option value="">-- Pilih --</option>
                         	@foreach($kategori as $kateg)
                         	<option value="{{ $kateg->id_kategori }}">{{ $kateg->nama_kategori }}</option>
                         	@endforeach
                         </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sort Galery :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="sort_galery" class="form-control col-md-7 col-xs-12" id="sort_galery" type="text" autocomplete="off" name="middle-name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Active Slider :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="active_galery" id="active_galery" class="form-control col-md-7 col-xs-12">
                          <option value="">-- Pilih --</option>
                          <option value="Active">Active</option>
                          <option value="Non Active">Non Active</option>
                        </select>
                        </div>
                      </div>
                    </form>



                <div class="modal-footer">
                  <button type="button" class="btn actionBtn btn-primary" data-dismiss="modal">
                    <span id="footer_action_button"></span>
                  </button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>



@endsection