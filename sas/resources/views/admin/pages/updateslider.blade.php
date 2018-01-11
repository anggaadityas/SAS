@extends('admin.layouts.template')


@section('content')

	<div class="col-md-5">

                    <form action="{{ route('InsertSliderProses') }}" class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST">

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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Slider :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="nama_slider" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">images slider :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12" >

                          <img id='imgSlider' width="200" height="190" class="img-circle" style="display:none;"><br><br>

                           <label class="btn btn-primary" id=UploadFileSlider>
				                Choose Slider <input type="file" id="ChooseImageSlider" accept="image/*" capture="camera" class="form-control col-md-7 col-xs-12" name="images_slider" style="display: none;">
				            </label>

				            <button type="button" class="btn btn-danger" onclick="clearImageSlider()" style=display:none; id="clearSlider"><strong>Clear Image</strong></button>
                        
                        </div>

                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sort Slider :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="sort_slider" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off" name="middle-name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Active Slider :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="active_slider" class="form-control col-md-7 col-xs-12">
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
                             <button class="btn btn-success upload-imageslider" type="submit">Save</button>
                        </div>
                      </div>

                    </form>

                    </div>


            <div class="col-md-7" style="margin-top:40px;">

                    <table id="datatable-checkbox dataslider" class="table table-striped table-bordered bulk_action dataslider">
                      <thead>
                        <tr>
                          <th>Nama Slider</th>
                          <th>Images Slider</th>
                          <th>Sort Slider</th>
                          <th>Status Slider</th>
                          <th>Create Slider</th>
                          <th>Modif Slider</th>
                          <th>User Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    </table>


              </div>




              <!-- Modal Edit Slider -->


        <div id="ModalEditSlider" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
               

                 <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" id="myFormSlider">

                      <input type="hidden" name="nama_user" id="nama_user" value="{{ session('username') }}">
                      <input type="hidden" id="id_slider" name="id_slider">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">


               <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Slider :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="nama_slider" id="nama_slider" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">images slider :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12" >

                        <img id='EditShowimgSlider' width="200" height="190" class="img-circle" style="display:none;"><br><br>


                    <img src="#" id="images_slider" name="EditimageSlider" width="200" height="190" class="img-circle">
                    <br><br>

                    <label class="btn btn-primary" id=EditUploadfileSlider>
                        Choose Slider <input type="file" id="EditChooseImageSlider" accept="image/*" capture="camera" class="form-control col-md-7 col-xs-12" name="EditimageSlider" style="display: none;">
                    </label>

                    <button type="button" class="btn btn-danger" onclick="EditClearImageSlider()" style=display:none; id="EditClearSlider"><strong>Clear Image</strong></button>
                        
                        </div>

                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sort Slider :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="sort_slider" class="form-control col-md-7 col-xs-12" id="sort_slider" type="text" autocomplete="off" name="middle-name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Active Slider :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="active_slider" id="active_slider" class="form-control col-md-7 col-xs-12">
                          <option value=""  >-- Pilih --</option>
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