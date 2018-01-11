<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Datatables;

class HasilTestInterviewController extends Controller
{
    
    public function ListKaryawanPsikotes(){

    	return view('admin.pages.listkaryawanpsikotes');

    }

    public function ListDataKaryawanPsikotes(Request $req){

    	if($req->ajax()){

    		$listdatakaryawanpsikotes = DB::table('tb_karyawan')
    			->leftjoin('tb_info_test','tb_info_test.no_ktp','=','tb_karyawan.no_ktp')
    			->leftjoin('tb_info_interview','tb_info_interview.no_ktp','=','tb_karyawan.no_ktp')
    			->where('tb_info_test.status','!=',' ')
    			->where('tb_info_interview.status','!=',' ')
    			->select('tb_karyawan.no_ktp','tb_karyawan.nama_depan','tb_karyawan.nama_belakang','tb_karyawan.nilai','tb_info_test.kode_test','tb_info_test.status','tb_info_interview.kd_interview','tb_info_interview.status')
    			->get();

    			return Datatables::of($listdatakaryawanpsikotes)
    			->addColumn('nama_lengkap', function($listdatakaryawanpsikotes){

    				$namalengkap = $listdatakaryawanpsikotes->nama_depan. ' ' .$listdatakaryawanpsikotes->nama_belakang. '';

    					return $namalengkap;

    			})
    			->addColumn('status_karyawan', function($listdatakaryawanpsikotes){

    				if($listdatakaryawanpsikotes->nilai == 0){
                            $status_karyawan = "<span class='label label-danger'>Tidak Lulus</span>";
                        }elseif($listdatakaryawanpsikotes->nilai == 1){
                            $status_karyawan = "<span class='label label-success'>Lulus</span>";
                        }else{
                            $status_karyawan = "<span class='label label-success'>not set</span>";
                        }

                        return $status_karyawan;


    			})
    			->addColumn('action', function($listdatakaryawanpsikotes) {
                    return '<a href="/sas/inputdatahasilpsikotes/'.$listdatakaryawanpsikotes->no_ktp.'"><i class="fa fa-pencil" aria-hidden="true" title="Input Data Hasil Psikotes"></i></a>';
                })
                ->make(true);

    	}else{
    		exit('Not Ajax Request');
    	}
    }

    public function InputDataHasilPsikotes($id){

    		$querydatakaryawan = "SELECT tb_info_test.no_ktp, tb_info_test.kode_test, tb_info_interview.kd_interview FROM tb_info_test
            INNER JOIN tb_info_interview ON tb_info_interview.no_ktp = tb_info_test.no_ktp WHERE tb_info_test.no_ktp = ?";

            $datakaryawan = DB::SELECT($querydatakaryawan,array($id));

            $kodepsikotes = $datakaryawan[0]->kode_test;
            $kodeinterview = $datakaryawan[0]->kd_interview;

            $querypsikotes = "SELECT id, nama_penilaian, nilai FROM tb_hasil_test WHERE kd_test = ? ";

            $datahasilpsikotes = DB::SELECT($querypsikotes,array($kodepsikotes));

            $queryhasilinterview = "SELECT * FROM tb_hasil_interview WHERE kd_interview = ?";
            $datahasilinterview = DB::SELECT($queryhasilinterview,array($kodeinterview));

            $querygradepsikotes = DB::table('tb_hasil_test')
            ->where('kd_test','=',$kodepsikotes)->count();
            
            $countgradepsikotes =  $querygradepsikotes;
              

            $querygradeinterview = DB::table('tb_hasil_interview')
            ->where('kd_interview','=',$kodeinterview)->count();
            
            $countgradeinterview =  $querygradeinterview;


    	return view('admin.pages.inputdatahasilpsikotes',compact('datakaryawan','datahasilpsikotes','datahasilinterview','countgradeinterview','countgradepsikotes'));

    }

    public function InputDataHasilPsikotesProses(Request $req){

    	if(isset($req->addTest)){

    		  DB::table('tb_hasil_test')->insert([
                    'kd_test' => $req->txt_kode,
                    'nama_penilaian' => $req->txt_nama,
                    'nilai' => $req->txt_nilai,
                    'kd_admin' => session('username')
                ]);

              return 'Data Berhasil Disimpan';

    	}elseif(isset($req->addInterview)){

    		  DB::table('tb_hasil_interview')->insert([
                    'kd_interview' => $req->txt_kode,
                    'nama_penilaian' => $req->txt_nama,
                    'nilai' => $req->txt_nilai,
                    'kd_admin' => session('username')
                ]); 

            return 'Data Berhasil Disimpan';
    	
        }
    	
    }

    public function DestroyListHasilPsikotes($id){

        DB::table('tb_hasil_test')->where('id', '=', $id)->delete();

        return 'Data Berhasil Dihapus';

    }

    public function DestroyListHasilInterview($id){

        DB::table('tb_hasil_interview')->where('id', '=', $id)->delete();

        return 'Data Berhasil Dihapus';

    }

    public function UpdateStatusKaryawanLulus(Request $req){

        DB::table('tb_karyawan')
            ->where('no_ktp','=',$req->id)
            ->update(['nilai' => $req->st]);

            return 'Data Berhasil Diupdate';

    }

    public function UpdateStatusKaryawanTidakLulus(Request $req){

        DB::table('tb_karyawan')
            ->where('no_ktp','=',$req->id)
            ->update(['nilai' => $req->st]);

            return 'Data Berhasil Diupdate';
    }



}
