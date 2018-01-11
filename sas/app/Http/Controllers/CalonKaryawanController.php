<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Datatables;
use Response;

class CalonKaryawanController extends Controller
{
	
	public function CalonKaryawan(){
                 
         return view('admin.pages.calonkaryawan');

    }

    public function ListCalonKaryawan(Request $req){

         if($req->ajax()){

                $listcalonkaryawan = DB::table('tb_karyawan')
                    ->leftjoin('tb_login_karyawan','tb_login_karyawan.no_ktp','=','tb_karyawan.no_ktp')
                    ->leftjoin('tb_apply_pekerjaan','tb_apply_pekerjaan.no_ktp','=','tb_karyawan.no_ktp')
                    ->leftjoin('tb_jenis_pekerjaan','tb_jenis_pekerjaan.kd_pekerjaan','=','tb_apply_pekerjaan.kd_pekerjaan')
                    ->where('no_NIK','=','')
                    ->select('tb_karyawan.no_ktp','no_NIK','nama_depan','nama_belakang','jenis_kelamin','tb_karyawan.email','nomor_hp','tb_login_karyawan.joining_date','tb_apply_pekerjaan.kd_pekerjaan','tb_jenis_pekerjaan.nama_pekerjaan')
                    ->get();

                    return Datatables::of($listcalonkaryawan)
                
                ->addColumn('nama_karyawan', function($listcalonkaryawan) {
                    return ''.$listcalonkaryawan->nama_depan.' '.$listcalonkaryawan->nama_belakang.'';
                })
                ->addColumn('namapekerjaan', function($listcalonkaryawan) {
                    return '<span class="label label-success">'.$listcalonkaryawan->nama_pekerjaan.'</span>';
                })
                ->addColumn('action', function($listcalonkaryawan) {
                    return '<a href="detailkaryawan/'.$listcalonkaryawan->no_ktp.'">
                  <button type="button" class="btn btn-primary btn-xs">
                    <i class="fa fa-user"></i> View Profile
                  </button>
                </a>';
                })
                ->make(true);

         }else{
            exit("Not an Ajax request");
         }

    }

    public function DetailCalonKaryawan($id){

        $detailkaryawan ='select * from tb_karyawan
            left join tb_login_karyawan on tb_karyawan.no_ktp=tb_login_karyawan.no_ktp
         where tb_karyawan.no_ktp = ?';

    	$querykeahlian ='select * from tb_karyawan
    		left join tb_info_keahlian on tb_karyawan.no_ktp=tb_info_keahlian.no_ktp
    	 where tb_karyawan.no_ktp = ?';

         $querypendidikan ='select * from tb_karyawan
            left join tb_info_pendidikan on tb_karyawan.no_ktp=tb_info_pendidikan.no_ktp
            where tb_karyawan.no_ktp = ?';

         $querybahasa ='select * from tb_karyawan
          left join tb_info_bahasa on tb_karyawan.no_ktp=tb_info_bahasa.no_ktp
         where tb_karyawan.no_ktp = ? ';

         $querykursus = 'select * from tb_karyawan left join tb_info_kursus on
         tb_karyawan.no_ktp = tb_info_kursus.no_ktp
         where tb_karyawan.no_ktp = ?';

         $querypenghargaan = 'select * from tb_karyawan left join tb_info_penghargaan on tb_karyawan.no_ktp=tb_info_penghargaan.no_ktp where tb_karyawan.no_ktp = ?';

         $querypenyakit = 'select * from tb_karyawan left join tb_info_penyakit on tb_karyawan.no_ktp=tb_info_penyakit.no_ktp where tb_karyawan.no_ktp = ?';

        $querykeluarga = 'select * from tb_karyawan left join tb_info_keluarga on tb_karyawan.no_ktp=tb_info_keluarga.no_ktp where tb_karyawan.no_ktp = ?';

        $querypekerjaan = 'select * from tb_karyawan left join tb_info_pekerjaan on tb_karyawan.no_ktp=tb_info_pekerjaan.no_ktp where tb_karyawan.no_ktp = ?';
            
        $queryreferensi = 'select * from tb_karyawan left join tb_info_referensi on tb_karyawan.no_ktp=tb_info_referensi.no_ktp where tb_karyawan.no_ktp = ?';

        $detailkaryawan = \DB::SELECT($detailkaryawan,array($id));
        $keahlian = \DB::SELECT($querykeahlian,array($id));
        $pendidikan = \DB::SELECT($querypendidikan,array($id));
        $bahasa = \DB::SELECT($querybahasa,array($id));
        $kursus = \DB::SELECT($querykursus,array($id));
        $penghargaan = \DB::SELECT($querypenghargaan,array($id));
        $penyakit = \DB::SELECT($querypenyakit,array($id));
        $keluarga = \DB::SELECT($querykeluarga,array($id));
        $pekerjaan = \DB::SELECT($querypekerjaan,array($id));
        $referensi = \DB::SELECT($queryreferensi,array($id));

         if($detailkaryawan == null){

            return redirect('errors.pagenotfound');

        }

        else{

    	return view('admin.pages.detailcalonkaryawan',compact('detailkaryawan','keahlian','pendidikan','bahasa','kursus','penghargaan','penyakit','keluarga','pekerjaan','referensi'));
        }

    }
}
