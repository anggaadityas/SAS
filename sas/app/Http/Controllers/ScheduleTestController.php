<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Datatables;
use Response;
use App\Http\Controllers\APIController;

class ScheduleTestController extends Controller
{
    
	public function ScheduleTest(){
    	return view('admin.pages.scheduletest');
    }

    public function ListSchedulePsikotes(Request $req){

    	if($req->ajax()){

    		$listschedulepsikotes = DB::table('tb_karyawan')
    			->leftjoin('tb_info_test','tb_info_test.no_ktp','=','tb_karyawan.no_ktp')
    			->where('tb_karyawan.no_NIK','=','')
    			->select('tb_karyawan.no_ktp','tb_karyawan.no_NIK', 'tb_karyawan.nama_depan', 'tb_karyawan.nama_belakang', 'tb_info_test.kode_test', 'tb_info_test.date_test', 'tb_info_test.nilai', 'tb_info_test.kode_admin', 'tb_info_test.status')
    			->get();

    			return Datatables::of($listschedulepsikotes)
                ->addColumn('namadepan', function($listschedulepsikotes){
                    $namadepan = $listschedulepsikotes->nama_depan ." " .$listschedulepsikotes->nama_belakang;

                    return $namadepan;
                })
                ->addColumn('statuspsikotes', function($listschedulepsikotes){
                    $statusinterview = '<span class="label label-success"> '.$listschedulepsikotes->status.'</span>';

                    return $statusinterview;
                })
    			->addColumn('action', function($listschedulepsikotes) {
                   if ($listschedulepsikotes->date_test == '') {
		              $button = '<a href="/sas/addscheduletest/'.$listschedulepsikotes->no_ktp.'"><button type="button" class="btn btn-primary btn-xs">
		                    <i class="fa fa-plus-square"> </i> Add Jadwal
		                  </button></a>';
            		}else{
		              $button = '<a href="/sas/addscheduletest/'.$listschedulepsikotes->no_ktp.'"><button type="button" class="btn btn-danger btn-xs">
		                    <i class="fa fa-plus-square"> </i> Re-Schedule
		                  </button></a>';
            
            		}

            			return $button;
                })
                ->make(true);

    	}else{
    		exit('Not an Ajax request');
    	}

    }

    public function AddScheduleTest($id){

            $queryaddscheduletest = "SELECT count(no_ktp) as nokat FROM tb_info_test WHERE no_ktp = ?";
            $scheduletest = DB::SELECT($queryaddscheduletest,array($id));


            $querydatakaryawan ="SELECT * FROM tb_karyawan WHERE no_ktp = ?";
            $datakaryawan = DB::SELECT($querydatakaryawan,array($id));

            $queryupdatescheduletest = "SELECT tb_karyawan.nama_depan, tb_karyawan.nama_belakang, tb_info_test.kode_test, tb_info_test.id, tb_info_test.date_test, tb_info_test.kode_admin FROM tb_info_test
LEFT JOIN tb_karyawan ON tb_karyawan.no_ktp=tb_info_test.no_ktp
WHERE tb_info_test.no_ktp = ?";
            $updatescheduletest = DB::SELECT($queryupdatescheduletest,array($id));


            return view('admin.pages.addjadwaltest',compact('scheduletest','datakaryawan','updatescheduletest'));

    }

    public function AddScheduleTestProses(Request $req){


        $Api =  New APIController;

        $id = "kode_test";
        $kode = "TESPSKT";
        $tbName = "tb_info_test";
        $kodetest = $Api->Generate($id, $kode, $tbName);


            DB::table('tb_info_test')->insert([
                    'kode_test' =>  $kodetest,
                    'no_ktp' => $req->no_ktp,
                    'date_test' => $req->tanggal,
                    'kode_admin' => session('username'),
                    'keterangan' => $req->txt_cv. ',' .$req->txt_kesehatan 
                ]);

            return redirect('addscheduletest');
    }

    public function AddScheduleTestUpdate(Request $req){

        DB::table('tb_info_test')
            ->where('id', $req->no_id)
            ->update([
                'date_test' => $req->kode_test,
                'date_test' => $req->tanggal,
                'kode_admin' => session('username'),
                'keterangan' => $req->txt_cv. ',' .$req->txt_kesehatan 
                ]);

            return redirect('addscheduletest');

    }

}
