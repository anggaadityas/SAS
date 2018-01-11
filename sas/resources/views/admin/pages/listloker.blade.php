@extends('admin.layouts.template')


@section('content')

<div class="insertloker">

	<div class="col-md-5">

                    <form action="{{ url('InsertLokerProses') }}" class="form-horizontal form-label-left" method="POST">

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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Judul Loker :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="judul_loker" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Area :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="area_loker" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Description :
                        </label>
                <div class="col-md-12 col-sm-9 col-xs-12">
                    <textarea class="ckeditor" name="job_description" rows="5" placeholder="Entry Job Description"></textarea>
                </div>
                </div>

                   <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Requirements :
                        </label>
                <div class="col-md-12 col-sm-9 col-xs-12">
                    <textarea class="ckeditor" name="requirements" rows="5" placeholder="Entry Requirements"></textarea>
                </div>
                </div>

                  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Salary :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="salary_loker" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                        <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Minimal Pengalaman :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="minpengalaman_loker" class="form-control">
                          	<option value="">-- PILIH --</option>
                          	<option value="0">Fresh Graduate</option>
                          	<option value="1">1 Tahun</option>
                          	<option value="2">2 Tahun</option>
                          	<option value="3">3 Tahun</option>
                          	<option value="4">4 Tahun</option>
                          	<option value="5">5 Tahun</option>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button class="btn btn-primary" type="reset">Reset</button>
                             <button class="btn btn-success sloker" type="submit">Save</button>
                        </div>
                      </div>

                    </form>

                    </div>

                    </div>


          <div class="editloker" style="display: none;">

          <div class="col-md-5">
          			
          		      <form action="{{ url('UpdateLokerProses') }}" class="form-horizontal form-label-left" method="POST">

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="nama_user" value="{{ session('username') }}">
                      <input type="hidden" name="id_loker" id="id_loker">

            
            <div class="alert alert-danger print-error-msg" style="display:none">
				        <ul></ul>
				    </div>

            @if(Session::has('alert-success'))
            <div class="alert alert-success">
              {{ Session::get('alert-success') }}
            </div>
            @endif


               <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Judul Loker :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="judul_loker" id="judul_loker" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Area :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="area_loker" id="area_loker" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Description :
                        </label>
                <div class="col-md-12 col-sm-9 col-xs-12">
                    <textarea class="ckeditor" name="job_description" id="job_description" rows="5" placeholder="Entry Job Description"></textarea>
                </div>
                </div>

                   <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Requirements :
                        </label>
                <div class="col-md-12 col-sm-9 col-xs-12">
                    <textarea class="ckeditor" name="requirements" id="requirements" rows="5" placeholder="Entry Requirements"></textarea>
                </div>
                </div>

                  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Salary :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="salary_loker" id="salary_loker" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off">
                        </div>
                      </div>

                        <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Minimal Pengalaman :</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="minpengalaman_loker" id="minpengalaman_loker" class="form-control">
                          	<option value="">-- PILIH --</option>
                          	<option value="0">Fresh Graduate</option>
                          	<option value="1">1 Tahun</option>
                          	<option value="2">2 Tahun</option>
                          	<option value="3">3 Tahun</option>
                          	<option value="4">4 Tahun</option>
                          	<option value="5">5 Tahun</option>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button class="btn btn-primary" type="reset">Reset</button>
                             <button class="btn btn-success uloker" type="submit">Save</button>
                        </div>
                      </div>

                    </form>

          </div>

          </div>


            <div class="col-md-7" style="margin-top:40px;">

                    <table id="datatable-checkbox dataloker" class="table table-striped table-bordered bulk_action dataloker">
                      <thead>
                        <tr>
                          <th>Judul Loker</th>
                          <th>Kategori</th>        
                          <th>Job Description</th>
                          <th>Requirement</th>
                          <th>Salary</th>
                          <th>Area Loker</th>
                          <th>Min Pengalaman</th>
                          <th>Create Loker</th>
                          <th>Modif Loker</th>
                          <th>Nama User</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    </table>


              </div>




@endsection