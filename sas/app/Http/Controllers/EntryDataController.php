<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Datatables;
use Response;
use App\Http\Controllers\APIController;
use Validator;

class EntryDataController extends Controller
{
    public function EntryData(){
    	return view('admin.pages.entrydata');
    }

    public function ListCompanyOld(Request $req){

    	if($req->ajax()){

	    $listcompanyold = DB::table('tb_temporary_perusahaan')
             ->leftjoin('tb_jenis_pekerjaan','tb_jenis_pekerjaan.kd_pekerjaan','=','tb_temporary_perusahaan.kode_pekerjaan')
             ->leftjoin('tb_kategori_pekerjaan','tb_kategori_pekerjaan.kode_kategori','=','tb_temporary_perusahaan.kebutuhan')
             ->leftjoin('tb_kerjasama_perusahan','tb_kerjasama_perusahan.kode_perusahaan','=','tb_temporary_perusahaan.no_pendaftaran')
             ->where('tb_temporary_perusahaan.kode_perusahaan','!=','')
             ->orderBy('tb_temporary_perusahaan.create_date', 'desc')
             ->select('tb_temporary_perusahaan.no_pendaftaran','tb_temporary_perusahaan.kode_perusahaan','tb_temporary_perusahaan.nama_perusahaan','tb_temporary_perusahaan.cp','tb_temporary_perusahaan.phone','tb_temporary_perusahaan.email','tb_temporary_perusahaan.create_date','tb_temporary_perusahaan.status','tb_jenis_pekerjaan.nama_pekerjaan','tb_kategori_pekerjaan.nama_kategori','tb_kerjasama_perusahan.nomor_kontrak')
             ->get();

             return Datatables::of($listcompanyold)
               ->addColumn('detail_request', function($listcompanyold) {
                    
                    if($listcompanyold->status == 3 ){
                        $detailrequest = '<i class="text-success"><span class="fa fa-fw fa-check-square-o"></span></i>';
                    }else if($listcompanyold->status == 4){
                        $detailrequest = '<i class="text-success"><span class="fa fa-fw fa-check-square-o"></span></i>';
                    }else{
                        $detailrequest = '<a href="addentrydata/'.$listcompanyold->no_pendaftaran.'"><button type="button" class="btn btn-success btn-xs"> <i class="fa fa-edit"></i>  Detail Request </button></a>';
                    }

                        return $detailrequest;

                })
               ->addColumn('add_karyawan', function($listcompanyold) {
                    
                    if($listcompanyold->status == 3 ){
                        $addkaryawan = '<a href="addlistkaryawan/'.$listcompanyold->nomor_kontrak.'"><button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user"></i>  Add Karyawan </button></a>';
                    }else if($listcompanyold->status == 4){
                        $addkaryawan = '<i class="text-success"><span class="fa fa-fw fa-check-square-o"></span></i>';
                    }else{
                        $addkaryawan = '<span class="label label-default">not sett</span>';
                    }

                    return $addkaryawan;

                })
               ->addColumn('list_pekerjaan', function($listcompanyold) {
                  
                    if($listcompanyold->status == 3 ){
                        $listkaryawan = '<span class="label label-default">not sett</span>';
                    }else if($listcompanyold->status == 4){
                        $listkaryawan = '<a href=""><button type="button" class="btn btn-success btn-xs"> <i class="fa fa-edit"></i>  List Pekerjaan</button></a>';
                    }else{
                        $listkaryawan = '<span class="label label-default">not sett</span>';
                    }

                    return $listkaryawan;

                })
                    ->make(true);
                } else{
                    exit("Not an Ajax request");
                }

    }

    public function ListCompanyNew(Request $req){

        if($req->ajax()){

            $listcompanynew = DB::table('tb_temporary_perusahaan')
                        ->leftjoin('tb_jenis_pekerjaan','tb_jenis_pekerjaan.kd_pekerjaan','=','tb_temporary_perusahaan.kode_pekerjaan')
                        ->leftjoin('tb_kategori_pekerjaan','tb_kategori_pekerjaan.kode_kategori','=','tb_temporary_perusahaan.kebutuhan')
                        ->where('tb_temporary_perusahaan.kode_perusahaan','=',' ')
                        ->orderBy('tb_temporary_perusahaan.create_date','desc')
                        ->select('tb_temporary_perusahaan.no_pendaftaran','tb_temporary_perusahaan.kode_perusahaan','tb_temporary_perusahaan.nama_perusahaan','tb_temporary_perusahaan.cp','tb_temporary_perusahaan.phone','tb_temporary_perusahaan.email','tb_temporary_perusahaan.create_date','tb_temporary_perusahaan.status','tb_jenis_pekerjaan.nama_pekerjaan','tb_kategori_pekerjaan.nama_kategori')
                        ->get();

                return Datatables::of($listcompanynew)
                ->addColumn('action', function($listcompanynew) {
                    return '<a href="#" class="modal-editlistcompanynew" title="view"><i class="fa fa-eye" aria-hidden="true"></i>
                            </a> &nbsp
                    <a href="#" class="destroycompanynew" data-id="'.$listcompanynew->no_pendaftaran.'" title="hapus">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>';
                })
                ->make(true);

        }else{
            exit("Not an Ajax request");
        }   

    }

    public function AddEntryData($id){

     $temp_perusahaan = DB::table('tb_temporary_perusahaan')
                ->leftjoin('tb_jenis_pekerjaan','tb_jenis_pekerjaan.kd_pekerjaan','=','tb_temporary_perusahaan.kode_pekerjaan')
                ->where('tb_temporary_perusahaan.no_pendaftaran','=',$id)
                ->select('tb_temporary_perusahaan.no_pendaftaran','tb_temporary_perusahaan.kode_perusahaan', 'tb_temporary_perusahaan.nama_perusahaan', 'tb_temporary_perusahaan.kebutuhan', 'tb_temporary_perusahaan.create_date', 'tb_temporary_perusahaan.kode_pekerjaan', 'tb_jenis_pekerjaan.nama_pekerjaan')
                ->get();

        return view('admin.pages.addentrydata',compact('temp_perusahaan'));

    }

    public function AddEntryDataProses(Request $request){
        
            $this->validate($request,[

                'txt_total' => 'required|numeric',
                'txt_deskripsi' => 'required',
                'txt_tugas' => 'required',
                'txt_tanggung' => 'required',
                'txt_penempatan' => 'required',
                'txt_nilai' => 'required|numeric'
            ],[
                'txt_total.required' => 'Total Karyawan Wajib Diisi',
                'txt_total.numeric' => 'Total Karyawan Harus Angka',
                'txt_deskripsi.required' => 'Deskripsi Wajib Diisi',
                'txt_tugas.required' => 'Tugas Wajib Diisi',
                'txt_tanggung.required' => 'Tanggung Jawab Wajib Diisi',
                'txt_penempatan.required' => 'Penempatan Wajib Diisi',
                'txt_nilai.required' => 'Nilai Wajib Diisi',
                'txt_nilai.numeric' => 'Nilai Harus Angka',
            ]);

        $controllerapi = new APIController;

        $id = "nomor_kontrak";
        $kode = "SPK-";
        $tbName = "tb_kerjasama_perusahan";
        $nomor = $controllerapi->Generate($id, $kode, $tbName);

            $insertjob = DB::table('tb_job')->insert([
                'nomor_kontrak' => $nomor
                ]);
            $insertkerjasama = DB::table('tb_kerjasama_perusahan')->insert([
                'nomor_kontrak' => $nomor,
                'kode_perusahaan' => $request->txt_req,
                'total_karyawan' => $request->txt_total,
                'deskripsi' => $request->txt_deskripsi,
                'tugas' => $request->txt_tugas,
                'tanggung_jwb' => $request->txt_tanggung,
                'penempatan' => $request->txt_penempatan,
                'kontrak_start' => $request->txt_start,
                'kontrak_end' => $request->txt_ends,
                'nilai_kontrak' => $request->txt_nilai,
                'kode_admin' => session('username')
                ]);
            $updatestatus = DB::table('tb_temporary_perusahaan')
                    ->where('no_pendaftaran', $request->txt_req)
                    ->update([
                        'status' => 3 
                        ]);

                    return redirect('entrydata');

    }

    public function AddListKaryawan($id){

        $addlistkaryawan = DB::table('tb_kerjasama_perusahan')
            ->leftjoin('tb_temporary_perusahaan','tb_temporary_perusahaan.no_pendaftaran','=','tb_kerjasama_perusahan.kode_perusahaan')
            ->leftjoin('tb_jenis_pekerjaan','tb_jenis_pekerjaan.kd_pekerjaan','=','tb_temporary_perusahaan.kode_pekerjaan')
            ->leftjoin('tb_kategori_pekerjaan','tb_kategori_pekerjaan.kode_kategori','=','tb_temporary_perusahaan.kebutuhan')
            ->where('tb_kerjasama_perusahan.nomor_kontrak','=',$id)
            ->select('tb_kerjasama_perusahan.nomor_kontrak', 'tb_kerjasama_perusahan.total_karyawan', 'tb_temporary_perusahaan.nama_perusahaan', 'tb_temporary_perusahaan.kode_perusahaan', 'tb_temporary_perusahaan.nama_perusahaan', 'tb_temporary_perusahaan.kebutuhan', 'tb_temporary_perusahaan.kode_pekerjaan', 'tb_jenis_pekerjaan.nama_pekerjaan', 'tb_kategori_pekerjaan.nama_kategori')
            ->get();

            $cek ='SELECT count(kode_list_karyawan) as total FROM tb_list_karyawan WHERE kode_list_karyawan = ?';

            $result = DB::SELECT($cek,array($id));

            $total_karyawan = $addlistkaryawan[0]->total_karyawan;
            $cektotalkaryawan = $result[0]->total;

            $kode_pekerjaan = $addlistkaryawan[0]->kode_pekerjaan;
            $nomor_kontrak = $addlistkaryawan[0]->nomor_kontrak;

            
            $availablekaryawan = DB::table('tb_karyawan')
                ->leftjoin('tb_apply_pekerjaan','tb_apply_pekerjaan.no_ktp','=','tb_karyawan.no_ktp')
                ->leftjoin('tb_jenis_pekerjaan','tb_jenis_pekerjaan.kd_pekerjaan','=','tb_apply_pekerjaan.kd_pekerjaan')
                ->leftjoin('tb_info_test','tb_info_test.no_ktp','=','tb_karyawan.no_ktp')
                ->leftjoin('tb_info_interview','tb_info_interview.no_ktp','=','tb_karyawan.no_ktp')
                ->where('tb_karyawan.status','=',' ')
                ->where('tb_apply_pekerjaan.kd_pekerjaan','=',$kode_pekerjaan)
                ->select('tb_apply_pekerjaan.kd_pekerjaan')
                ->get();

            $cekavailablekaryawan = $availablekaryawan->count();


            $querychoosekaryawan = 'SELECT tb_karyawan.no_ktp, tb_karyawan.no_NIK, tb_karyawan.nama_depan, tb_karyawan.nama_belakang,tb_karyawan.status, tb_apply_pekerjaan.kd_pekerjaan, tb_jenis_pekerjaan.nama_pekerjaan, tb_info_test.kode_test, tb_info_interview.kd_interview, tb_karyawan.nilai FROM tb_karyawan 
LEFT JOIN tb_apply_pekerjaan ON tb_apply_pekerjaan.no_ktp=tb_karyawan.no_ktp
LEFT JOIN tb_jenis_pekerjaan ON tb_jenis_pekerjaan.kd_pekerjaan=tb_apply_pekerjaan.kd_pekerjaan
LEFT JOIN tb_info_test ON tb_info_test.no_ktp = tb_karyawan.no_ktp LEFT JOIN tb_info_interview ON tb_info_interview.no_ktp = tb_karyawan.no_ktp WHERE tb_apply_pekerjaan.kd_pekerjaan = ? AND tb_karyawan.status = " " ';
            
            $choosekaryawan = DB::SELECT($querychoosekaryawan,array($kode_pekerjaan));

            return view('admin.pages.select-listkaryawan',compact('addlistkaryawan','total_karyawan','cektotalkaryawan','cekavailablekaryawan','kode_pekerjaan','choosekaryawan'));

    }

    public function AddListJob($id){

            $querydatajob = "SELECT * FROM tb_job WHERE nomor_kontrak = ?";
            $datajob = DB::SELECT($querydatajob, array($id));

            $kode_detail_job = $datajob[0]  ->kode_detail_job;

            $querylistjob = 'SELECT * FROM tb_list_job WHERE kode_detail_job = ?';
            $listjob = DB::SELECT($querylistjob,array($kode_detail_job));

        return view('admin.pages.addlistjobkaryawan',compact('listjob','datajob'));

    }

    public function AddListJobProses(Request $req){

            DB::table('tb_list_job')->insert([
                    'kode_detail_job' =>$req->txt_kode,
                    'nama_job'=> $req->txt_title,
                    'deskripsi_job' => $req->txt_tugas,
                    'keterangan'=> $req->txt_tanggungJawab,
                    'kode_admin' => session('username')
                ]);

            return 'Data Berhasil Disimpan';

    }

    public function DeleteListJob($id){


        DB::table('tb_list_job')->where('id', '=', $id)->delete();

        return 'Data Berhasil Dihapus';

    }

    public function GenerateKodeListJob(Request $req){


            $cekapi = new APIController;

            $id = "kode_detail_job";
            $kode = "DTL-";
            $tbName = "tb_job";
            $kode = $cekapi->Generate($id,$tbName, $kode);

           DB::table('tb_job')
            ->where('nomor_kontrak', $req->id)
            ->update(['kode_detail_job' => $kode]);

            return 'Kode List Job Berhasil Di Generate';

    }



}
