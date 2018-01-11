<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\ListLoker;
use App\CategoryCompany;
use App\Http\Requests;
use Response;
use Datatables;

class ListLokerController extends Controller
{
    	
	public function ListLoker(){
		$kategori = CategoryCompany::all();
    	return view('admin.pages.listloker',compact('kategori'));
    }

    public function DataLoker(Request $request)
    {
        // cek ajax request   
        if($request->ajax()){
            $loker = ListLoker::all();
            return Datatables::of($loker)
                    // tambah kolom untuk aksi edit dan hapus
                    ->addColumn('action', function($loker) {
                    return '<a href="#" class="showeditloker" data-judul="'.$loker->judul_loker.'" data-id="'.$loker->id_loker.'" data-jobdesc="'.$loker->job_description.'" data-requirements="'.$loker->requirements.'" data-salary="'.$loker->salary_loker.'" data-area="'.$loker->area_loker.'" data-minpengalaman="'.$loker->minpengalaman_loker.'"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="#" class="backloker" style="display:none;"><i class="fa fa-refresh" aria-hidden="true"></i></a> &nbsp 
                    <a href="#" class="hapus_loker" data-id="'.$loker->id_loker.'">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>';
                })
                    ->make(true);
        } else {
            exit("Not an AJAX request");
        }
     }

    public function InsertLokerProses(Request $request){

    $validator = Validator::make($request->all(), [
    	'judul_loker' => 'required',
    	'id_kategori' => 'required',
    	'area_loker' => 'required',	
    	'job_description' => 'required',
    	'requirements' =>'required',
    	'salary_loker' => 'required',
    	'minpengalaman_loker' => 'required',
    ]);


      if ($validator->passes()) {


        $input = $request->all();   
        $input['create_loker'] = date("Y/m/d H:i:s");
        
        ListLoker::create($input);
        return response()->json(['success'=>'done']);

      }

      return response()->json(['error'=>$validator->errors()->all()]);   
	
	}

	public function UpdateLokerProses(Request $request){

    $validator = Validator::make($request->all(), [
    	'judul_loker' => 'required',
    	'id_kategori' => 'required',
    	'area_loker' => 'required',	
    	'job_description' => 'required',
    	'requirements' =>'required',
    	'salary_loker' => 'required',
    	'minpengalaman_loker' => 'required',
    ]);


      if ($validator->passes()) {


        $UpdateLoker = ListLoker::find($request->id_loker);
        $UpdateLoker->judul_loker = $request->judul_loker;
        $UpdateLoker->job_description = $request->job_description;
        $UpdateLoker->requirements = $request->requirements;
        $UpdateLoker->salary_loker = $request->salary_loker;
        $UpdateLoker->area_loker = $request->area_loker;
        $UpdateLoker->minpengalaman_loker = $request->minpengalaman_loker;
        $UpdateLoker->nama_user = $request->nama_user;

        $UpdateLoker->save();

        return response()->json(['success'=>'done']);

      }

      return response()->json(['error'=>$validator->errors()->all()]);   
	
	}

	   function DestroyLoker($id){

        $UpdateLoker = new ListLoker;
        $UpdateLoker = ListLoker::find($id);
        $UpdateLoker->delete($id);

    }

}
