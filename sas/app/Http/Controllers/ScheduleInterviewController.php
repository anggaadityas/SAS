<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Datatables;
use Response;
use App\Http\Controllers\ApiController;

class ScheduleInterviewController extends Controller
{
    public function ScheduleInterview(){
    	return view('admin.pages.ScheduleInterview');
    }

    public function ListScheduleInterview(Request $req){

    	if($req->ajax()){

    		$listscheduleinterview = DB::table('tb_karyawan')
    			->leftjoin('tb_info_interview','tb_info_interview.no_ktp','=','tb_karyawan.no_ktp')
    			->where('tb_karyawan.no_NIK','=',' ')
    			->select('tb_karyawan.no_ktp','tb_karyawan.no_NIK','tb_karyawan.nama_depan','tb_karyawan.nama_belakang','tb_info_interview.kd_interview','tb_info_interview.date_interview','tb_info_interview.detail','tb_info_interview.status','tb_info_interview.kd_admin','tb_info_interview.create_date')
    			->get();

    		return Datatables::of($listscheduleinterview)
    		->addColumn('namadepan', function($listscheduleinterview){
                    $namadepan = $listscheduleinterview->nama_depan ." " .$listscheduleinterview->nama_belakang;

                    return $namadepan;
                })
            ->addColumn('statusinterview', function($listscheduleinterview){
                    $statusinterview = '<span class="label label-success"> '.$listscheduleinterview->status.'</span>';

                    return $statusinterview;
                })
    		->addColumn('action', function($listscheduleinterview) {
                   if ($listscheduleinterview->date_interview == '') {
		              $button = '<a href="/sas/addscheduleinterview/'.$listscheduleinterview->no_ktp.'"><button type="button" class="btn btn-primary btn-xs">
                    <i class="fa fa-plus-square"> </i> Add Jadwal
                  </button></a>';
            		}else{
		              $button = '<a href="/sas/addscheduleinterview/'.$listscheduleinterview->no_ktp.'"><button type="button" class="btn btn-warning btn-xs">
                    <i class="fa fa-plus-square"> </i> Re-schedule
                  </button></a>';
            
            		}

            			return $button;
                })
                ->make(true);

    	}else{
    		exit('Not an Ajax Request');
    	}

    }

    public function AddListScheduleInterview($id){

        $cekdatainterview = "SELECT count(no_ktp) as nokat FROM tb_info_interview WHERE no_ktp = ?";
        $cekinterview =  DB::SELECT($cekdatainterview,array($id));

        $querydatakaryawan = "SELECT * FROM tb_karyawan WHERE no_ktp = ? ";
        $datakaryawan = DB::SELECT($querydatakaryawan,array($id));

        $queryupdatedatainterview = "SELECT tb_karyawan.nama_depan, tb_karyawan.nama_belakang, tb_info_interview.kd_interview, tb_info_interview.id, tb_info_interview.date_interview, tb_info_interview.detail, tb_info_interview.kd_admin FROM tb_info_interview
            LEFT JOIN tb_karyawan ON tb_karyawan.no_ktp=tb_info_interview.no_ktp
            WHERE tb_info_interview.no_ktp = ? ";

        $updatedatainterview = DB::SELECT($queryupdatedatainterview,array($id));



        return view('admin.pages.addjadwalinterview',compact('cekinterview','datakaryawan','updatedatainterview'));

    }

    public function AddListScheduleInterviewProses(Request $req){

        $Api = new ApiController;

        $id = "kd_interview";
        $kode = "ITRV";
        $tbName = "tb_info_interview";
        $kodeinterview = $Api->Generate($id, $kode, $tbName);
             
        DB::table('tb_info_interview')->insert([

                'kd_interview' => $kodeinterview,
                'no_ktp' => $req->no_ktp,
                'date_interview' => $req->tanggal,
                'detail' => $req->detail,
                'kd_admin' => session('username')
            ]);

        return redirect('scheduleinterview');
    }

    public function AddListScheduleInterviewUpdate(Request $req){

        DB::table('tb_info_interview')
            ->where('id', $req->no_id)
            ->update([
                'date_interview' => $req->tanggal,
                'detail' => $req->detail,
                'kd_admin' => session('username')
                ]);

            return redirect('scheduleinterview');
    }
}
