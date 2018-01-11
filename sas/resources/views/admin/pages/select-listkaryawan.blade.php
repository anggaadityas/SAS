@extends('admin.layouts.template')


@section('content')

		@if($total_karyawan == $cektotalkaryawan)

		<div class="col-md-6 col-lg-offset-3">
            <div class="well">
                <h4 class="text-danger">INFORMATION</h4>
                <p>Total Jumlah Karyawan yang dibutuhkan untuk Nomor SPK <span class="label label-primary">{{ $addlistkaryawan[0]->nomor_kontrak }}</span> sudah terpenuhi!</p>
                <hr>
                <p>Silahkan untuk menginput <a href="/SAS/addlistjobkaryawan/{{ $addlistkaryawan[0]->nomor_kontrak }}"><span class="label label-danger"><strong>LIST PEKERJAAN</strong></span></a> Karyawan.</p>
            </div>
        </div>

		@else

			@if(!empty($kode_pekerjaan))


				@if($cekavailablekaryawan == 0)

						<div class="col-md-6 col-lg-offset-3">
		                <div class="well">
		                    <h4 class="text-danger"><strong>INFORMATION</strong></h4>
		                    <p>Karyawan yang sesuai dengan posisi <span class="label label-primary">{{ $addlistkaryawan[0]->nama_pekerjaan }}</span> belum tersedia!</p>
		                    <hr>
		                    <p>Silahkan untuk membuat pengajuan request <a href=""><span class="label label-danger"><strong>LIST LOKER</strong></span></a> untuk posisi <span class="label label-danger">{{ $addlistkaryawan[0]->nama_pekerjaan }}</span>.</p>
		                </div>
		            </div>

		            @else

		            	<h2>Pilih Karyawan</h2>
		            <hr>
		            <p>Select Karyawan untuk bekerja pada Perusahaan <strong>{{ $addlistkaryawan[0]->nama_perusahaan }}</strong>
		                dengan NOMOR KONTRAK <strong>{{ $addlistkaryawan[0]->nomor_kontrak }}</strong>.</p>

		                {{-- table choose karyawan --}}


		                <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Nomor KTP</th>
                        <th class="column-title">Nomor NIP</th>
                        <th class="column-title">Nama Karyawan</th>
                        <th class="column-title">Pekerjaan</th>
                        <th class="column-title">Hasil Ujian</th>
                        <th class="column-title">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($choosekaryawan as $choosekar)

                    
                            <tr class="even pointer">
                                <td>{{ $choosekar->no_ktp }}</td>
                                <td>{{ $choosekar->no_NIK }}</td>
                                <td>
                                    <a href="">{{ $choosekar->nama_depan. ' ' .$choosekar->nama_belakang. '' }}</a>
                                </td>
                                <td>{{ $choosekar->nama_pekerjaan }}</td>
                                <td>
                                	
                        @if($choosekar->nilai == '1')
                               <span class="label label-success">Lulus</span>
                           @elseif($choosekar->nilai == '0')
                               <span class="label label-danger">Gagal</span>
                            @else 
                               <span class="label label-default">belum ujian</span>
                        @endif

                                </td>
                                <td>
                                @if(empty($choosekar->id))
                                   {{-- <button class="btn btn-xs btn-danger" onclick="return confirm('Not Add, NIP Empty');"><strong>Not Add</strong></button> --}}

                                   <a href="#" class="addkaryaawan" data-id="{{ $choosekar->no_NIK }}" data-notrak="{{ $addlistkaryawan[0]->nomor_kontrak }}" data-jumkar="{{ $cektotalkaryawan }}">
                                        <button class="btn btn-xs btn-primary"><span class="fa fa-fw fa-plus"></span>
                                             Add
                                        </button>
                                    </a>
                                 @else
                                 	 <a href="#" class="addkaryaawan">
                                        <button class="btn btn-xs btn-primary"><span class="fa fa-fw fa-plus"></span>
                                             Add
                                        </button>
                                    </a>
                                @endif
                                </td>

                            </tr>

                          @endforeach

                    </tbody>
                </table>
            </div>
		            


		           @endif

		   @else

		    <div class="col-md-6 col-lg-offset-3">
            <div class="well">
                <h4 class="text-danger" style="font-weight: bold;">INFORMATION</h4>
                <p>Total Jumlah Karyawan yang dibutuhkan adalah <span
                            class="label label-primary">{{ $addlistkaryawan[0]->total_karyawan }}</span> belum terpenuhi!
                </p>
                <hr>
                <p>Dikarenakan Calon Karyawan untuk posisi <span
                            class="label label-danger">{{ $addlistkaryawan[0]->nama_kategori }}</span> belum tersedia!</p>
            </div>
        </div>

        @endif

   @endif





@endsection