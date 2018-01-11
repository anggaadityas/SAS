<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Response;
use Datatables;


class NewCustomerController extends Controller
{
    
	public function NewCustomer(){
    	return view('admin.pages.newcustomer');
    }

    public function RequestNew(Request $req){

    	// cek ajax request   
        if($req->ajax()){
            $requestcustomer = DB::table('tb_temporary_perusahaan')
            				->leftjoin('tb_jenis_pekerjaan','tb_temporary_perusahaan.kode_pekerjaan','=','tb_jenis_pekerjaan.kd_pekerjaan')
            				->leftjoin('tb_kategori_pekerjaan','tb_temporary_perusahaan.kebutuhan','=','tb_kategori_pekerjaan.kode_kategori')
            				->leftjoin('tb_status_request','tb_temporary_perusahaan.kd_status','=','tb_status_request.kd_stat')
            				->select('tb_temporary_perusahaan.no_pendaftaran','tb_temporary_perusahaan.kode_perusahaan','tb_temporary_perusahaan.nama_perusahaan','tb_temporary_perusahaan.cp','tb_temporary_perusahaan.phone','tb_temporary_perusahaan.email','tb_temporary_perusahaan.create_date','tb_temporary_perusahaan.kd_status','tb_temporary_perusahaan.tanggal','tb_temporary_perusahaan.status','tb_jenis_pekerjaan.nama_pekerjaan','tb_kategori_pekerjaan.nama_kategori','tb_status_request.nama_status')
            				->get();
            return Datatables::of($requestcustomer)
                    // tambah kolom untuk aksi edit dan hapus
                    ->addColumn('action', function($requestcustomer) {
                    return '<a href="#" class="updateprog" title="view" data-id="'.$requestcustomer->no_pendaftaran.'"><i class="fa fa-eye" aria-hidden="true"></i>
					</a> &nbsp
                    <a href="#" class="destroyrequest" title="hapus" data-id="'.$requestcustomer->no_pendaftaran.'">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>';
                })
                    ->addColumn('contactperson', function($requestcustomer){
                    	return '<strong><span class="text-info">'.$requestcustomer->cp.' | '.$requestcustomer->phone . '</span></strong>';
                })
                ->addColumn('statuscompany', function($requestcustomer){
                    	
               		if ($requestcustomer->status == 0) {          
              			$statuscompany = '<span class="label label-default">Old Company</span>';
            		}else{
              			$statuscompany = '<span class="label label-success">New Company</span>';
              		}
            		return $statuscompany;
                })
                    ->make(true);
        } else {
            exit("Not an AJAX request");
        }

    }

    public function destroyrequest($id){

        $destroyreq = DB::table('tb_temporary_perusahaan')->where('no_pendaftaran',$id)->delete();

        return 'ok';

    }

    public function DetailRequest(Request $req){

        $id = $req->id;
        $query =  DB::table('tb_temporary_perusahaan')
                    ->leftjoin('tb_jenis_pekerjaan','tb_temporary_perusahaan.kode_pekerjaan','=','tb_jenis_pekerjaan.kd_pekerjaan')
                    ->leftjoin('tb_kategori_pekerjaan','tb_temporary_perusahaan.kebutuhan','=','tb_kategori_pekerjaan.kode_kategori')
                    ->leftjoin('tb_status_request','tb_temporary_perusahaan.kd_status','=','tb_status_request.kd_stat')
                    ->select('tb_temporary_perusahaan.no_pendaftaran','tb_temporary_perusahaan.kode_perusahaan','tb_temporary_perusahaan.nama_perusahaan','tb_temporary_perusahaan.cp','tb_temporary_perusahaan.phone','tb_temporary_perusahaan.email','tb_temporary_perusahaan.create_date','tb_temporary_perusahaan.kd_status','tb_temporary_perusahaan.tanggal','tb_temporary_perusahaan.status','tb_jenis_pekerjaan.nama_pekerjaan','tb_kategori_pekerjaan.nama_kategori','tb_status_request.nama_status')
                    ->where('tb_temporary_perusahaan.no_pendaftaran', '=', $id)
                    ->get();

                    return Response::json($query); 

    }

    public function UpdateStatusRequest(Request $req){

        date_default_timezone_set('Asia/Jakarta');

            DB::table('tb_temporary_perusahaan')
                ->where('no_pendaftaran', $req->id )
                ->update([
                  'kd_status' => $req->status,
                  'tanggal' => date('Y-m-d h:i:s')
                  ]);

                return 'Data Berhasil Diupdate';

    }


}
