<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\UpdateGalery;
use App\CategoryCompany;
use App\Http\Requests;
use Response;
use Datatables;

class UpdateGaleryController extends Controller
{
    
	public function UpdateGalery(){

		$kategori = CategoryCompany::all();
    	return view('admin.pages.updategalery',compact('kategori'));
    }

    public function DataGalery(Request $request)
    {
        // cek ajax request   
        if($request->ajax()){
            $galery = UpdateGalery::all();
            return Datatables::of($galery)
                    // tambah kolom untuk aksi edit dan hapus
                    ->addColumn('action', function($galery) {
                    return '<a href="#" class="edit-modalgalery" data-name="'.$galery->nama_galery.'" data-id="'.$galery->id_galery.'" data-sort="'.$galery->sort_galery.'" data-active="'.$galery->active_galery.'" data-img-url="sas/public/galery/'.$galery->images_galery.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp
                    <a href="#" class="hapus_galery" data-id="'.$galery->id_galery.'">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>';
                })
                    ->addColumn('images', function($galery) { 
                    return '<img src="sas/public/galery/'.$galery->images_galery.'" width="100" height="80" />';
                })
                    ->make(true);
        } else {
            exit("Not an AJAX request");
        }
    }

    public function InsertGaleryProses(Request $request){

    $validator = Validator::make($request->all(), [
    	'nama_galery' => 'required',
    	'sort_galery' => 'required|numeric',
    	'id_kategori' => 'required',
    	'active_galery' => 'required',
        'images_galery' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);


      if ($validator->passes()) {


        $input = $request->all();   
        $input['create_galery'] = date("Y/m/d H:i:s");
        $input['images_galery'] = time().'.'.$request->images_galery->getClientOriginalExtension();
        // Move Folder
        $request->images_galery->move(public_path('galery'), $input['images_galery']);
        
        UpdateGalery::create($input);
        return response()->json(['success'=>'done']);

      }

      return response()->json(['error'=>$validator->errors()->all()]);   
	
	}

	 function EditGalery(Request $Req){

      $EditGalery = UpdateGalery::find($Req->id_galery);
      $EditGalery->nama_galery = $Req->nama_galery;
      $EditGalery->id_kategori = $Req->id_kategori;

      if(isset($_POST['EditChooseImageGalery'])){

      }
      else{
          $temp = explode(".", $_FILES["EditChooseImageGalery"]["name"]);
          $newfilename = round(microtime(true)) . '.' . end($temp);
          $EditGalery->images_galery = $newfilename;
         
          // Move Folder  
          move_uploaded_file($_FILES["EditChooseImageGalery"]["tmp_name"],"sas/public/galery/" . $newfilename);
      }
      
      $EditGalery->sort_galery = $Req->sort_galery;
      $EditGalery->active_galery = $Req->active_galery;
      $EditGalery->nama_user = $Req->nama_user;

      $EditGalery->save();


    }

    function DestroyGalery($id){

        $UpdateGalery = new UpdateGalery;
        $UpdateGalery = UpdateGalery::find($id);
        $UpdateGalery->delete($id);

    }



}
