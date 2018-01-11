@extends('admin.layouts.template')



@section('content')


@if($scheduletest[0]->nokat == 0)

        <div class="x_panel">
            <div class="x_title">
                <h2>Input Mask</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form method="post" action="{{ url('addscheduletestproses') }}" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Calon Karyawan</label>
                        <div class="col-md-5 col-sm-5 col-xs-9">
                            <input name="nama_karyawan" type="text" class="form-control"
                                   value="{{ $datakaryawan[0]->nama_depan.' '.$datakaryawan[0]->nama_belakang. '' }}"
                                   readonly>
                             <input name="no_ktp" type="hidden" class="form-control" value="{{ $datakaryawan[0]->no_ktp }}">
                              <input name="_token" type="hidden" class="form-control" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Dokumen yang dibutuhkan</label>
                        <div class="col-md-5 col-sm-5 col-xs-9">
                            <div class="col-md-5 col-sm-5 col-xs-9">
                                <div class="checkbox">
                                    <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                        <input type="checkbox" name = "txt_cv" value = "cv" class="flat" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                        </ins></div> CV Lengkap
                                    </label>
                                    <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                        <input type="checkbox" name = "txt_kesehatan" value = "surat kesehatan" class="flat" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                        </ins></div> Surat Kesehatan
                                    </label>
                                    
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Test Psikolog</label>
                        <div class="col-md-5 col-sm-5 col-xs-9">
                            <div class="control-group">
                                <input type="text" class="form-control has-feedback-left" name="tanggal"
                                       id="datepsikotes" aria-describedby="inputSuccess2Status4">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" name="addJadwal" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>


        </div>

        </div>
        </div>
        </div>


 @else
   

      <div class="x_panel">
          <div class="x_title">
            <h2>Update Schedule</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br>
            <form method="post" action="{{ url('addscheduletestupdate') }}" class="form-horizontal form-label-left">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Kode Test</label>
                    <div class="col-md-5 col-sm-5 col-xs-9">
                      <input name="kode_test" type="text" class="form-control" value="{{ $updatescheduletest[0]->kode_test }}" readonly>
                      <input name="no_id" type="hidden" class="form-control" value="{{ $updatescheduletest[0]->id }}">
                       <input name="_token" type="hidden" class="form-control" value="{{ csrf_token() }}">

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Calon Karyawan</label>
                    <div class="col-md-5 col-sm-5 col-xs-9">
                      <input name="nama_karyawan" type="text" class="form-control" value="{{ $updatescheduletest[0]->nama_depan. ' ' .$updatescheduletest[0]->nama_belakang. '' }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Dokumen yang dibutuhkan</label>
                    <div class="col-md-5 col-sm-5 col-xs-9">
                      <div class="checkbox">
                          <label class="">
                              <div class="icheckbox_flat-green" style="position: relative;">
                              <input type="checkbox" name = "txt_cv" value = "cv" class="flat" style="position: absolute; opacity: 0;">
                              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                              </ins></div> CV Lengkap
                          </label>
                          <label class="">
                              <div class="icheckbox_flat-green" style="position: relative;">
                              <input type="checkbox" name = "txt_kesehatan" value = "surat kesehatan" class="flat" style="position: absolute; opacity: 0;">
                              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                              </ins></div> Surat Kesehatan
                          </label>
                           
                          </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Test Psikolog</label>
                    <div class="col-md-5 col-sm-5 col-xs-9">
                      <div class="control-group">
                          <input type="text" class="form-control has-feedback-left" name="tanggal" id="datepsikotes"  aria-describedby="inputSuccess2Status4" value="">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-md-9 col-md-offset-3">
                    <button type="submit" name="addData" class="btn btn-success">Submit</button>
                  </div>
                </div>

            </form>
          </div>
      </div>






                      </div>

        </div>
        </div>
        </div>

  @endif


@endsection