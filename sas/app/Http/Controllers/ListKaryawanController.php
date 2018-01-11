<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Validator;
use Response;

class ListKaryawanController extends Controller
{
    public function ListKaryawan(){

    	$datalistkaryawan = DB::table('tb_karyawan')
    			->where('nilai','!=',' ')
    			->paginate(4); 

    	return view('admin.pages.listkaryawan',compact('datalistkaryawan'));
    }

    public function DaftarListKaryawan(Request $req){

    	DB::table('tb_karyawan')
            ->where('no_ktp', $req->id)
            ->update(['no_nik' => $req->id]);

            return 'Data Berhasl Diupdate';

    }

}
