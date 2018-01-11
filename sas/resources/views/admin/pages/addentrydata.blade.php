@extends('admin.layouts.template')

@section('content')

	<div class="row">
    <div class="col-md-8">
        

    <div class="x_panel">
      <div class="x_title">
        <h2>Detail Request <small>different form</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>

        <form class="form-horizontal form-label-left" autocomplete="off" method="post" action="{{ url('addentrydataproses') }}">


        @if(count($errors))
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif



          <div class="form-group {{ $errors->has('txt_total') ? 'has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Karyawan <span class="required">*</span>
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="number" id="txt_total" name="txt_total" class="form-control"  value="{{ old('txt_total') }}" placeholder="total karyawan">
              <span class="text-danger">{{ $errors->first('txt_total') }}</span>
              <input type="hidden" name="txt_kode" class="form-control" value="{{ $temp_perusahaan[0]->kode_perusahaan  }}">
                <input type="hidden" name="txt_req" class="form-control" value="{{ $temp_perusahaan[0]->no_pendaftaran  }}">         
            <input type="hidden" name="_token" value="{{ csrf_token() }}"  class="form-control">
            </div>
          </div>

          <div class="form-group {{ $errors->has('txt_deskripsi') ? 'has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Pekerjaan <span class="required">*</span>
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <textarea  name="txt_deskripsi" class="form-control" rows="3" placeholder="gambaran luas tentang deskripsi pekerjaan" >{{ old('txt_deskripsi') }}</textarea>
              <span class="text-danger">{{ $errors->first('txt_deskripsi') }}</span>
            </div>
          </div>


          <div class="form-group {{ $errors->has('txt_tugas') ? 'has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tugas<span class="required">*</span>
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <textarea class="form-control" name="txt_tugas" rows="3" placeholder="gambaran luar tentang tugas pekerjaan">{{ old('txt_tugas') }}</textarea>
              <span class="text-danger">{{ $errors->first('txt_tugas') }}</span>
            </div>
          </div>


          <div class="form-group {{ $errors->has('txt_tanggung') ? 'has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggung Jawab<span class="required">*</span>
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <textarea class="form-control" name="txt_tanggung" rows="3" placeholder="gambaran luas tentang tanggung jawab pekerjaan" >{{ old('txt_tanggung') }}</textarea>
              <span class="text-danger">{{ $errors->first('txt_tanggung') }}</span>
            </div>
          </div>


          <div class="form-group {{ $errors->has('txt_penempatan') ? 'has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Penempatan Kerja</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" name="txt_penempatan" class="form-control" placeholder="nama kota penempatan"  value="{{ old('txt_penempatan') }}">
              <span class="text-danger">{{ $errors->first('txt_penempatan') }}</span>
            </div>
          </div>


          <div class="form-group {{ $errors->has('txt_nilai') ? 'has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nilai Pekerjaan</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="number" name="txt_nilai" class="form-control" placeholder=""  value="{{ old('txt_nilai') }}">
              <span class="text-danger">{{ $errors->first('txt_nilai') }}</span>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kontrak Start</label>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <input type="text" name="txt_start" class="form-control has-feedback-left" name="tanggal" id="datepsikotes"  aria-describedby="inputSuccess2Status4">
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
            </div>
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Kontrak Ends</label>
            <div class="col-md-4 col-sm-3 col-xs-12">
                

                                <input class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" name="txt_ends" aria-describedby="inputSuccess2Status" type="text">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              

            </div>
          </div>
          

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" name="addData" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Perusahaan </h2>
                <div class="clearfix"></div>
              </div>
            <div class="form form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <strong class="form-control"> {{ $temp_perusahaan[0]->kode_perusahaan }}</strong>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" disabled="disabled" value="{{ $temp_perusahaan[0]->nama_perusahaan }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Kebutuhan</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" disabled="disabled" value="{{ $temp_perusahaan[0]->nama_pekerjaan }}">
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>


@endsection