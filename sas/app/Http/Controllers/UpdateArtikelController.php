<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\UpdateArtikel;
use App\CategoryCompany;
use App\Http\Requests;
use Response;
use Datatables;

class UpdateArtikelController extends Controller
{
    
	public function UpdateArtikel(){
		$kategori = CategoryCompany::all();
    	return view('admin.pages.updateartikel',compact('kategori'));
    }

    public function DataArtikel(Request $request)
    {
        // cek ajax request   
        if($request->ajax()){
            $artikel = UpdateArtikel::all();
            return Datatables::of($artikel)
                    // tambah kolom untuk aksi edit dan hapus
                    ->addColumn('action', function($artikel) {
                    return '<a href="#" class="showeditartikel" data-name="'.$artikel->nama_artikel.'" data-id="'.$artikel->id_artikel.'" data-isi="'.$artikel->isi_artikel.'" data-active="'.$artikel->active_artikel.'" data-img-url="sas/public/artikel/'.$artikel->images_artikel.'"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="#" class="backartikel" style="display:none;"><i class="fa fa-refresh" aria-hidden="true"></i></a> &nbsp
                    <a href="#" class="hapus_artikel" data-id="'.$artikel->id_artikel.'">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>';
                })
                    ->addColumn('images', function($artikel) { 
                    return '<img src="sas/public/artikel/'.$artikel->images_artikel.'" width="100" height="80" />';
                })
                    ->make(true);
        } else {
            exit("Not an AJAX request");
        }
    }

    public function InsertArtikelProses(Request $request){

    $validator = Validator::make($request->all(), [
    	'nama_artikel' => 'required',
    	'isi_artikel' => 'required',
    	'id_kategori' => 'required',
    	'active_artikel' => 'required',
        'images_artikel' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);


      if ($validator->passes()) {


        $input = $request->all();   
        $input['create_artikel'] = date("Y/m/d H:i:s");
        $input['images_artikel'] = time().'.'.$request->images_artikel->getClientOriginalExtension();
        // Move Folder
        $request->images_artikel->move(public_path('artikel'), $input['images_artikel']);
        
        UpdateArtikel::create($input);
        return response()->json(['success'=>'done']);

      }

      return response()->json(['error'=>$validator->errors()->all()]);   
	
	}

	 function EditArtikel(Request $Req){


	 $validator = Validator::make($Req->all(), [
    	'nama_artikel' => 'required',
    	'edit_artikel' => 'required',
    	'id_kategori' => 'required',
    	'active_artikel' => 'required',
    ]);


      if ($validator->passes()) {	

      $EditArtikel = UpdateArtikel::find($Req->id_artikel);
      $EditArtikel->nama_artikel = $Req->nama_artikel;
      $EditArtikel->id_kategori = $Req->id_kategori;

      if(isset($_POST['EditChooseImageArtikel'])){

      }
      else{
          $temp = explode(".", $_FILES["EditChooseImageArtikel"]["name"]);
          $newfilename = round(microtime(true)) . '.' . end($temp);
          $EditArtikel->images_artikel = $newfilename;
         
          // Move Folder  
          move_uploaded_file($_FILES["EditChooseImageArtikel"]["tmp_name"],"sas/public/artikel/" . $newfilename);
      }
      
      $EditArtikel->isi_artikel = $Req->edit_artikel;
      $EditArtikel->active_artikel = $Req->active_artikel;
      $EditArtikel->nama_user = $Req->nama_user;

      $EditArtikel->save();

        return response()->json(['success'=>'done']);

      }

      return response()->json(['error'=>$validator->errors()->all()]);   
	

    }

    function DestroyArtikel($id){

        $UpdateArtikel = new UpdateArtikel;
        $UpdateArtikel = UpdateArtikel::find($id);
        $UpdateArtikel->delete($id);

    }


}
