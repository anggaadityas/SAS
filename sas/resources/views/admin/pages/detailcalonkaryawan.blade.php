@extends('admin.layouts.template')


@section('content')



<div class="x_panel">
  <div class="x_title">
    <h2>Detail Calon Karyawan</h2>
    
    <div class="clearfix"></div>
  </div>
  <div class="x_content">

    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
      <div class="profile_img">
        <div id="crop-avatar">
          <!-- Current avatar -->
          <img class="img-responsive avatar-view" src="{{ url('public/images/user.png') }}" alt="Avatar" title="Change the avatar">
        </div>
      </div>
      <h3>{{ $detailkaryawan[0]->nama_depan }} {{  $detailkaryawan[0]->nama_belakang }} <button class="btn btn-success btn-sm">{{ $detailkaryawan[0]->jenis_kelamin }}</h3>

      <ul class="list-unstyled user_data">
        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $detailkaryawan[0]->alamat }}, {{ $detailkaryawan[0]->kelurahan }}, {{ $detailkaryawan[0]->kecamatan }}, {{ $detailkaryawan[0]->kota }} 
        </li>

        <li>
          <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
        </li>

        <li class="m-top-xs">
          <i class="fa fa-external-link user-profile-icon"></i>
          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
        </li>
      </ul>

      @if($detailkaryawan[0]->no_NIK == '')
        <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>NIK belum terdaftar</a>
        <br/>
      @else
        <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>{{ $detailkaryawan[0]->no_NIK }}</a>
        <br/>
      @endif


      <!-- start skills -->
      <h4 class="text-success"> <strong>Keahlian</strong></h4>
      <ul class="list-unstyled user_data">

      @foreach($keahlian as $detailkar)

        <li>
          <p>{{ $detailkar->nama_keahlian }}</p>
          <div class="progress progress">
            <div class="progress-bar bg-info" role="progressbar" data-transitiongoal="{{ $detailkar->nilai }}" aria-valuenow="0" style="width: 0%;">{{ $detailkar->nilai }}%</div>
          </div>
        </li>

        @endforeach
          
      </ul>


      <!-- end of skills -->

      <br/>


    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">

      <div class="profile_title">
        <div class="col-md-6">
          <h2>Informasi Data</h2>
        </div>
        <div class="col-md-6">
          
        </div>
      </div>
      
      <br/>

      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pendidikan</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Bahasa</a>
          </li>
           <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Kursus</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Penghargaan</a>
          </li>
           <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Penyakit</a>
          </li>
        </ul>

        <div id="myTabContent" class="tab-content">

          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

            <!-- start recent activity -->
            <ul class="messages">
                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th class="column-title">Tingkat Pendidikan </th>
                        <th class="column-title">Nama Badan Pendidikan </th>
                        <th class="column-title">Jurusan </th>
                        <th class="column-title">Tahun Masuk </th>
                        <th class="column-title">Tahun Keluar </th>
                        <th class="column-title">Nilai (Rata-Rata) </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    @foreach($pendidikan as $detailkar)

                    <tbody>

                      <tr class="even pointer">
                        
                        <td class="">{{ $detailkar->tingkat }}</td>
                        <td class="">{{ $detailkar->nama_bapen }}</td>
                        <td class="">{{ $detailkar->jurusan }}</td>
                        <td class="">{{ $detailkar->tahun_masuk }}</td>
                        <td class="">{{ $detailkar->tahun_lulus }}</td>
                        <td class="">{{ $detailkar->nilai }}</td>
                        
                      </tr>
                      
                      @endforeach 

                    </tbody>
                  </table>
                </div>
            </ul>
            <!-- end recent activity -->

          </div>


          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

            @foreach($bahasa as $detailkar)

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel tile overflow_hidden">
                    <div class="x_title">
                      <h2>{{ $detailkar->nama_bahasa }}</h2>
                      
                      <div class="clearfix"></div>
                    </div>
                    <div class="progress progress">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $detailkar->writing }}" aria-valuenow="0" style="width: 0%;">{{ $detailkar->writing }}%</div>
                    </div>
                    <div class="progress progress">
                      <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="{{ $detailkar->listening }}" aria-valuenow="0" style="width: 0%;"> {{ $detailkar->listening }}%</div>
                    </div>
                    <div class="progress progress">
                      <div class="progress-bar bg-blue" role="progressbar" data-transitiongoal="{{ $detailkar->speaking }}" aria-valuenow="0" style="  width: 0%;"> {{ $detailkar->speaking }}%</div>
                    </div>
                    <div class="x_panel footer">
                      <i class="fa fa-square green"></i> Writing
                      <i class="fa fa-square red"></i> Listening 
                      <i class="fa fa-square blue"></i> Speaking 

                    </div>
                  </div>
                </div>

            @endforeach
                
            <!-- end user projects -->

          </div>

           <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th class="column-title">Bidang Kursus</th>
                      <th class="column-title">Badan Penyelenggara </th>
                      <th class="column-title">Tahun Masuk </th>
                      <th class="column-title">Tahun Lulus </th>
                    </tr>

                    @foreach($kursus as $detailkar)

                  <tbody>

                    <tr class="even pointer">
                      
                      <td class=" ">{{ $detailkar->nama_bidang }}</td>
                      <td class=" ">{{ $detailkar->nama_penyelenggara }}</td>
                      <td class=" ">{{ $detailkar->tahun_masuk }}</td>
                      <td class=" ">{{ $detailkar->tahun_lulus }}</td>
                    </tr>
                   
                  </tbody>

            @endforeach
                </table>
              </div>

          </div>

          <!-- end -->

           <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
            
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th class="column-title">Nama Penghargaan</th>
                      <th class="column-title">Tingkat Bidang </th>
                      <th class="column-title">Keterangan </th>
                    </tr>
                  </thead>

                  <tbody>

                  @foreach($penghargaan as $detailkar)

                    <tr class="even pointer">
                      
                      <td class=" ">{{ $detailkar->nama_penghargaan }}</td>
                      <td class=" ">{{ $detailkar->tingkat }}</td>
                      <td class=" ">{{ $detailkar->keterangan }}</td>
                    </tr>
                  
                    @endforeach

                  </tbody>
                </table>
              </div>

          </div>

          <!-- end -->

           <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
            
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th class="column-title">Nama Penyakit</th>
                      <th class="column-title">Status Diagnosis Terakhir</th>
                    </tr>
                  </thead>

                  <tbody>

                  @foreach($penyakit as $detailkar)

                    <tr class="even pointer">
                      
                      <td class=" ">{{ $detailkar->nama_penyakit }}</td>
                      <td class=" ">{{ $detailkar->status }}</td>
                    </tr>
                    
                    @endforeach

                  </tbody>
                </table>
              </div>

          </div>


          <!-- end -->


      <!-- Informasi Personal -->


            <div class="col-md-12">
      <div class="profile_title">
        <div class="col-md-6">
          <h2>Informasi Personal</h2>
        </div>
        <div class="col-md-6">
          
        </div>
      </div>
      
      <br>

      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content7" id="next-tab" role="tab" data-toggle="tab" aria-expanded="true">Keluarga</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content8" role="tab" id="personal-tab" data-toggle="tab" aria-expanded="false">Pekerjaan</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content9" role="tab" id="personal-tab" data-toggle="tab" aria-expanded="false">Referensi</a>
          </li>
          
        </ul>

        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content7" aria-labelledby="next-tab">

            <!-- start recent activity -->
            <ul class="messages">
                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th class="column-title">Nama Lengkap </th>
                        <th class="column-title">Status Keluarga </th>
                        <th class="column-title">Jenis Kelamin </th>
                        <th class="column-title">Pendidikan </th>
                        <th class="column-title">Pekerjaan </th>
                        <th class="column-title">Handphone </th>
                        <th class="column-title">Status </th>
                        
                      </tr>
                    </thead>
                    <tbody>

                    <tbody>
                   
                    @foreach($keluarga as $detailkar)

                      <tr class="even pointer">
                        
                        <td class=" ">{{ $detailkar->nama_lengkap }}
                        <td class=" ">{{ $detailkar->status_keluarga }}</td>
                        <td class=" ">{{ $detailkar->jenis_kelamin }}</td>
                        <td class=" ">{{ $detailkar->pendidikan  }}</td>
                        <td class=" ">{{ $detailkar->pekerjaan  }}</td>
                        <td class=" ">{{ $detailkar->nomor_handphone  }}</td>
                        @if($detailkar->hub_urgent == '1')
                        <td><span class="label label-success"><span class="fa fa-user"></span></span></td>
                        @else
                        <td class=" "></td>
                        @endif

                      </tr>
                      
                      @endforeach

                    </tbody>
                  </table>
                </div>
            </ul>
            <!-- end recent activity -->

          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="personal-tab">

            <!-- start user projects -->
              
                
            <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th class="column-title">Nama Perusahaan </th>
                        <th class="column-title">Tahun Masuk </th>
                        <th class="column-title">Tahun Keluar </th>
                        <th class="column-title">Jabatan </th>
                        <th class="column-title">Gaji Terakhir </th>
                        <th class="column-title">Alasan Berhenti </th>
                        <th class="column-title">Keterangan </th>
                        
                      </tr>
                    </thead>
                    <tbody>

                    <tbody>

                    @foreach($pekerjaan as $detailkar)

                      <tr class="even pointer">
                        
                        <td class=" ">{{ $detailkar->nama_perusahaan }}
                        <td class=" ">{{ $detailkar->tahun_masuk }}</td>
                        <td class=" ">{{ $detailkar->tahun_keluar }}</td>
                        <td class=" ">{{ $detailkar->jabatan }}</td>
                        <td class=" ">{{ $detailkar->gaji }}</td>
                        <td class=" ">{{ $detailkar->alasan_berhenti }}</td>
                        <td class=" ">{{ $detailkar->keterangan }}</td>
                        

                      </tr>
                    
                    @endforeach

                    </tbody>
                  </table>
                </div>
                                
            <!-- end user projects -->

          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content9" aria-labelledby="personal-tab">
            <div class="table-responsive">
                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th class="column-title">Nama Lengkap </th>
                        <th class="column-title">Jabatan </th>
                        <th class="column-title">Nomor Handphone </th>
                        <th class="column-title">Hubungan </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      
                    <tbody>

                    @foreach($referensi as $detailkars)

                      <tr class="even pointer">
                        
                        <td class=" ">{{ $detailkars->nama_lengkap }}
                        <td class=" ">{{ $detailkars->jabatan }}</td>
                        <td class=" ">{{ $detailkars->nomor_hp }}</td>
                        <td class=" ">{{ $detailkars->hubungan }}</td>
                        

                      </tr>
                    
                    @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
          </div>


        </div>
      </div>

                   


        </div>
      </div>
    </div>





      </div>


        </div>
      </div>

    </div>
  </div>
</div>

@endsection