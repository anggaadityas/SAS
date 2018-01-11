@extends('admin.layouts.template')


@section('content')

<div class="insertartikel">

	<div class="col-md-5">

                    <form action="{{ route('InsertArtikelProses') }}" class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST">

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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Artikel :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="nama_artikel" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">images Artikel :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12" >

                          <img id='imgArtikel' width="200" height="190" class="img-circle" style="display:none;"><br><br>

                           <label class="btn btn-primary" id=uploadfileArtikel>
				                Choose Artikel <input type="file" id="ChooseImageArtikel" accept="image/*" capture="camera" class="form-control col-md-7 col-xs-12" name="images_artikel" style="display: none;">
				            </label>

				            <button type="button" class="btn btn-danger" onclick="clearImageArtikel()" style=display:none; id="ClearImagesArtikel"><strong>Clear Image</strong></button>
                        
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
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi Artikel :
                        </label>
                <div class="col-md-12 col-sm-9 col-xs-12">
                    <textarea class="ckeditor" name="isi_artikel" id="isi_artikel" rows="5" placeholder="Entry Artikel"></textarea>
                </div>
                </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Active Artikel :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="active_artikel" class="form-control col-md-7 col-xs-12">
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
                             <button class="btn btn-success upload-imageartikel" type="submit">Save</button>
                        </div>
                      </div>

                    </form>

                    </div>

            </div>


     <div class="editartikel" style="display: none;">

          <div class="col-md-5">

                  <form action="{{ route('EditArtikel') }}" class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST">

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="nama_user" value="{{ session('username') }}">
                      <input type="hidden" name="id_artikel" id="id_artikel">

            
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>

            @if(Session::has('alert-success'))
            <div class="alert alert-success">
              {{ Session::get('alert-success') }}
            </div>
            @endif


               <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Artikel :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="nama_artikel" id="nama_artikel" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">images artikel :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12" >

                        <img id='EditShowimgArtikel' width="200" height="190" class="img-circle" style="display:none;"><br><br>


                    <img src="#" id="images_artikel" name="EditimageGalery" width="200" height="190" class="img-circle">
                    <br><br>

                    <label class="btn btn-primary" id=EditUploadfileArtikel>
                        Choose Artikel <input type="file" id="EditChooseImageArtikel" accept="image/*" capture="camera" class="form-control col-md-7 col-xs-12" name="EditChooseImageArtikel" style="display: none;">
                    </label>

                    <button type="button" class="btn btn-danger" onclick="EditclearImageArtikel()" style=display:none; id="EditClearArtikel"><strong>Clear Image</strong></button>
                        
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
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi Artikel :
                        </label>
                <div class="col-md-12 col-sm-9 col-xs-12">
                    <textarea class="ckeditor" name="edit_artikel" id="edit_artikel" rows="5" placeholder="Entry Artikel"></textarea>
                </div>
                </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Active Artikel :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="active_artikel" class="form-control col-md-7 col-xs-12">
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
                             <button class="btn btn-success upload-imageeditartikel" type="submit">Save</button>
                        </div>
                      </div>

                    </form>

          </div>

      </div>


            <div class="col-md-7" style="margin-top:40px;">

                    <table id="datatable-checkbox dataartikel" class="table table-striped table-bordered bulk_action dataartikel">
                      <thead>
                        <tr>
                          <th>Nama Artikel</th>        
                          <th>Isi Artikel</th>
                          <th>Images Artikel</th>
                          <th>Status Artikel</th>
                          <th>Kategori Artikel</th>
                          <th>Create Artikel</th>
                          <th>Modif Artikel</th>
                          <th>User Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    </table>


              </div>




    


@endsection