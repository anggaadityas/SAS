<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Http\Requests;
use Response;
use App\LoginKaryawan;


class ImportDataExecelController extends Controller
{
    
    public function importexcel(){

    	return view('admin.pages.importdataexcel');
    }

    public function importdataexcel(Request $request)

	{


		if($request->hasFile('import_file')){

			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
		

							$insert[] = ['no_ktp' => $value['no_ktp'], 'email' => $value['email'], 'password' => password_hash($value['password'], PASSWORD_DEFAULT)];

				}

				if(!empty($insert)){

					LoginKaryawan::insert($insert);

					return back()->with('success','Data Karyawan Berhasil Diimport.');

				}

			}
		}

		return back()->with('error','Mohon Cek Kembali Data Yang akan Di Upload');
	}
}
