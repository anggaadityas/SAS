@extends('admin.layouts.template')


@section('content')


<div class="x_panel">
    <div class="well">
        <h5 class="page-header">KETENTUAN NILAI</h5>
        <p>GRADE nilai A = 4, B = 3, C = 2, D = 1. Penilaian untuk masing-masing kategori yaitu "total kriteria / banyaknya kriteria".</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Psikotes <span class="small">hasil psikotes</span></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"></a>
                    <li><a class="collapse-link"></a>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-inline" method="post" action="{{ url('inputdatahasilpsikotesproses') }}">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Email address</label>
                        <input type="text" name="txt_nama" class="form-control" placeholder="nama kriteria penilaian" required>
                        <input type="hidden" name="txt_kode" class="form-control" value="{{ $datakaryawan[0]->kode_test}}">
                        <input type="hidden" name="_token" class="form-control" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group">
                    <select name="txt_nilai" class="form-control">
                        <option value="0" selected>GRADE</option>
                        <option value="4">=> A</option>
                        <option value="3">=> B</option>
                        <option value="2">=> C</option>
                        <option value="1">=> D</option>
                    </select>
            </div>
                    <button type="submit" name="addTest" class="btn btn-sm btn-danger"><span class="fa fa-fw fa-plus"></span></button>
                </form>
                <br>
                <table class="table table-striped">
                    <thead>
                    <th>nama kriteria</th>
                    <th>grade</th>
                    <th>#</th>
                    </thead>
                    <tbody>

               <p style=display:none;>   
                    {{ $sum = 0 }}
                     </p>

            @foreach($datahasilpsikotes as $psikotes)  

                 <p style=display:none;> 
                           {{ $n = $psikotes->nilai }}
                           {{ $sum += $n }} 
                       </p> 

                    <tr>
                        <td width="60%">{{ $psikotes->nama_penilaian }}</td>
                        <td width="20%">{{ $psikotes->nilai }}</td>
                        <td width="20%">
                            <a href="/sas/destroylisthasilpsikotes/{{ $psikotes->id }}" onclick="return confirm('Are you sure you want to delete this item?');">
                                <button class="btn btn-xs btn-danger"><span class="fa fa-fw fa-trash"></span></button>
                            </a>
                        </td>
                    </tr>
               
               @endforeach

                <p style=display:none;>  

                     {{ $total = $countgradepsikotes  }}
                    
                  @if($sum != "0" && $total != "0")
                     {{ $hasil_psikotes = @($sum/$total) }} 
                     {{  $total = @($sum/$total) }} 
                  @endif
                    
                  @if(empty($total))
                     {{ $grade = "null" }}
                  @endif
                    

                  @if($total > 0 && $total < 2)
                       {{  $grade = "D" }}        
                  @elseif($total = 2 && $total < 3 )
                       {{ $grade = "C" }}
                  @elseif($total = 3 && $total < 4)
                       {{ $grade = "B" }}
                  @elseif($total = 4)
                       {{ $grade = "A" }}
                  @else
                       {{ $grade = "null" }}
                  @endif

                   </p>


                    <tr>
                        <td>Total Nilai: </td>
                        <td>{{ $sum }}</td>
                        <td>GRADE: {{ $grade }} </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Interview <span class="small">hasil interviews</span></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"></a>
                    <li><a class="collapse-link"></a>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-inline" method="post" action="{{ url('inputdatahasilpsikotesproses') }}">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Email address</label>
                        <input type="text" name="txt_nama" class="form-control" placeholder="nama kriteria penilaian" required>
                        <input type="hidden" name="txt_kode" class="form-control" value="{{ $datakaryawan[0]->kd_interview }}">
                       <input type="hidden" name="_token" class="form-control" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group">
                        <select name="txt_nilai" class="form-control">
                            <option value="0" selected>GRADE</option>
                            <option value="4">=> A</option>
                            <option value="3">=> B</option>
                            <option value="2">=> C</option>
                            <option value="1">=> D</option>
                        </select>
                    </div>
                    <button type="submit" name="addInterview" class="btn btn-sm btn-danger"><span class="fa fa-fw fa-plus"></span></button>
                </form>
                <br>
                <table class="table table-striped">
                    <thead>
                    <th>nama kriteria</th>
                    <th>grade</th>
                    <th>#</th>
                    </thead>
                    <tbody>          
                   
                 <p style=display:none;>
                        {{ $sum = 0 }}
                     </p>

               		@foreach($datahasilinterview as $interview)

               		 <p style=display:none;> 
                           {{ $n = $interview->nilai }}
                           {{ $sum += $n }} 
                       </p>

                        <tr>
                            <td width="60%">{{ $interview->nama_penilaian }}</td>
                            <td width="20%">{{ $interview->nilai }}</td>
                            <td width="20%">
                                <a href="/sas/destroylisthasilinterview/{{ $interview->id }}" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <button class="btn btn-xs btn-danger"><span class="fa fa-fw fa-trash"></span></button>
                                </a>
                            </td>
                        </tr>
           
                 @endforeach

                <p style=display:none;>  

                     {{ $total = $countgradeinterview  }}
                    
                  @if($sum != "0" && $total != "0")
                     {{ $hasil_interview = @($sum/$total) }} 
                     {{  $total = @($sum/$total) }} 
                  @endif
                    
                  @if(empty($total))
                     {{ $grade = "null" }}
                  @endif
                    

                  @if($total > 0 && $total < 2)
                       {{  $grade = "D" }}        
                  @elseif($total = 2 && $total < 3 )
                       {{ $grade = "C" }}
                  @elseif($total = 3 && $total < 4)
                       {{ $grade = "B" }}
                  @elseif($total = 4)
                       {{ $grade = "A" }}
                  @else
                       {{ $grade = "null" }}
                  @endif

                   </p>

                    <tr>
                        <td>Total Nilai:</td>
                        <td>{{ $sum }}</td>
                        <td>GRADE:{{ $grade }} </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-psikolog">simpan nilai</button>
    </div>
</div>

{{-- Modal Hasil Psikotes --}}

<div class="modal fade modal-psikolog" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;">simpan nilai</h4>
            </div>
            <form class="modal-body">

                <table class="table table-bordered">
                    <thead>
                    <th>Total Nilai Psikotes</th>
                    <th>Total Nilai Interviews</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $hasil_psikotes }}</td>
                        <td>{{ $hasil_interview }}</td>
                    </tr>
                    <tr>

                <p style=display:none;>  
                     {{ $subtotal = ($hasil_psikotes+$hasil_interview)/2 }}
                     </p>
                        <td colspan="2">Total Nilai: {{ $subtotal }} </td>
                    </tr>

                  <p style=display:none;>  

                      @if($subtotal > 0 && $subtotal < 2)
                           {{  $grade = "D" }}        
                      @elseif($subtotal = 2 && $subtotal < 3 )
                           {{ $grade = "C" }}
                      @elseif($subtotal = 3 && $subtotal < 4)
                           {{ $grade = "B" }}
                      @elseif($subtotal = 4)
                           {{ $grade = "A" }}
                      @else
                           {{ $grade = "null" }}
                      @endif
                  </p>

                    <tr>
                        <td colspan="2">GRADE TOTAL: {{ $grade  }}</td>
                    </tr>

                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-xs lulus" data-id="{{ $datakaryawan[0]->no_ktp }}"> <i class="fa fa-check">
                    </i> Lulus</button>
                <button type="button" class="btn btn-danger btn-xs gagal" data-id="{{ $datakaryawan[0]->no_ktp }}"> <i class="fa fa-close">
                    </i> Tidak Lulus</button>
            </div>

        </div>
    </div>
</div>



@endsection