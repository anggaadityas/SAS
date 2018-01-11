@extends('admin.layouts.template')



@section('content')


@if($cekinterview[0]->nokat == 0)

    <div class="x_panel">
        <div class="x_title">
            <h2>Input Mask</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form method="post" action="{{ url('addscheduleinterviewproses') }}" class="form-horizontal form-label-left">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Calon Karyawan</label>
                    <div class="col-md-5 col-sm-5 col-xs-9">
                        <input name="nama_karyawan" type="text" class="form-control"
                               value="{{ $datakaryawan[0]->nama_depan. ' ' .$datakaryawan[0]->nama_belakang. '' }}" readonly>
                        <input name="no_ktp" type="hidden" class="form-control" value="{{ $datakaryawan[0]->no_ktp }}">
                         <input name="_token" type="hidden" class="form-control" value="{{ csrf_token() }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Interviews</label>
                    <div class="col-md-5 col-sm-5 col-xs-9">
                        <div class="control-group">
                            <input type="text" class="form-control has-feedback-left" name="tanggal" id="datepsikotes"
                                   aria-describedby="inputSuccess2Status4">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Details</label>
                    <div class="col-md-5 col-sm-5 col-xs-9">
                        <textarea name="detail" rows="3" class="form-control has-feedback-left"></textarea>

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
      <form method="post" action="{{ url('addscheduleinterviewupdate') }}" class="form-horizontal form-label-left">
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Kode Interviews</label>
              <div class="col-md-5 col-sm-5 col-xs-9">
                <input name="kode_test" type="text" class="form-control" value="{{ $updatedatainterview[0]->kd_interview }}" readonly>
                 <input name="no_id" type="hidden" class="form-control" value="{{ $updatedatainterview[0]->id }}">
                 <input name="_token" type="hidden" class="form-control" value="{{ csrf_token() }}">

              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Calon Karyawan</label>
              <div class="col-md-5 col-sm-5 col-xs-9">
                <input name="nama_karyawan" type="text" class="form-control" value="{{ $updatedatainterview[0]->nama_depan. ' ' .$updatedatainterview[0]->nama_belakang. '' }}" readonly>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Interviews</label>
              <div class="col-md-5 col-sm-5 col-xs-9">
                <div class="control-group">
                    <input type="text" class="form-control has-feedback-left" name="tanggal" id="datepsikotes"  aria-describedby="inputSuccess2Status4" value="">
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                  </div>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Details</label>
              <div class="col-md-5 col-sm-5 col-xs-9">
                <textarea name="detail" rows="3" class="form-control has-feedback-left">{{ $updatedatainterview[0]->detail }}</textarea>

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


  @endif

@endsection
