@extends('admin.layouts.template')


@section('content')


<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li style="text-transform: uppercase;">list calon karyawan yang lolos</li>
                        </ul>
                      </div>

                      <div class="clearfix"></div>

                      <div class="row">
                          <div class="col-md-12">
                

                     	@foreach($datalistkaryawan as $karyawan)     

                              <div class="col-md-6 col-sm-6 col-xs-12 profile_details">
                                  <div class="well profile_view">
                                      <div class="col-sm-12">
                                          <h4 class="brief"><span class="fa fa-qrcode"></span> <i>{{ $karyawan->no_NIK }}</i></h4>
                                          <div class="left col-xs-8">
                                              <h2>{{ $karyawan->nama_depan. ' ' .$karyawan->nama_belakang. '' }}</h2>
                                              <p><strong>About: </strong> Web Designer / UI. </p>
                                              <ul class="list-unstyled">
                                                  <li><i class="fa fa-building"></i> Address: {{ $karyawan->alamat. ',' .$karyawan->kelurahan. ',' .$karyawan->kecamatan. ',' .$karyawan->kota. '' }} </li>
                                                  <li><i class="fa fa-envelope"></i> Mail : {{ $karyawan->email }} </li>
                                                  <li><i class="fa fa-phone-square"></i> Phone : {{ $karyawan->nomor_hp }} </li>
                                              </ul>
                                          </div>
                                          <div class="right col-xs-4 text-center">
                                              <img src="{{ $karyawan->foto}}" alt="" class="img-rounded img-responsive">
                                          </div>
                                      </div>
                                      <div class="col-xs-12 bottom text-center">
                                          <div class="col-xs-12 col-sm-6 emphasis">
                                              <p class="ratings">
                                                  <a>4.0</a>
                                                  <a href="#"><span class="fa fa-star"></span></a>
                                                  <a href="#"><span class="fa fa-star"></span></a>
                                                  <a href="#"><span class="fa fa-star"></span></a>
                                                  <a href="#"><span class="fa fa-star"></span></a>
                                                  <a href="#"><span class="fa fa-star-o"></span></a>
                                              </p>
                                          </div>
                                          <div class="col-xs-12 col-sm-6 emphasis">
                                              <button type="button" class="btn btn-success btn-xs daftar" data-id="{{ $karyawan->no_ktp }}"> <i class="fa fa-user">
                                                  </i> Approve</button>
                                              <a href="detailkaryawan/{{ $karyawan->no_ktp }}">
                                                  <button type="button" class="btn btn-primary btn-xs">
                                                      <i class="fa fa-user"> </i> View Profile
                                                  </button>
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              	
                        @endforeach    


                       {{ $datalistkaryawan->links('vendor.pagination.bootstrap-4') }}  	

                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection