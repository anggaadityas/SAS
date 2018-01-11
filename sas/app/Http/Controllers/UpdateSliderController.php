<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\UpdateSlider;
use App\Http\Requests;
use Response;
use Datatables;

class UpdateSliderController extends Controller
{
    
	public function UpdateSlider(){

    	return view('admin.pages.updateslider');

    }

     public function DataSlider(Request $request)
    {
        // cek ajax request   
        if($request->ajax()){
            $slider = UpdateSlider::all();
            return Datatables::of($slider)
                    // tambah kolom untuk aksi edit dan hapus
                    ->addColumn('action', function($slider) {
                    return '<a href="#" class="edit-modalslider" data-name="'.$slider->nama_slider.'" data-id="'.$slider->id_slider.'" data-sort="'.$slider->sort_slider.'" data-active="'.$slider->sort_slider.'" data-img-url="sas/public/slider/'.$slider->images_slider.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp
                    <a href="#" class="hapus_slider" data-id="'.$slider->id_slider.'">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>';
                })
                    ->addColumn('images', function($slider) { 
                    return '<img src="sas/public/slider/'.$slider->images_slider.'" width="100" height="80" />';
                })
                    ->make(true);
        } else {
            exit("Not an AJAX request");
        }
    }

    public function InsertSliderProses(Request $request){

    $validator = Validator::make($request->all(), [
    	'nama_slider' => 'required',
    	'sort_slider' => 'required|numeric',
    	'active_slider' => 'required',
        'images_slider' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);


      if ($validator->passes()) {


        $input = $request->all();   
        $input['create_slider'] = date("Y/m/d H:i:s");
        $input['images_slider'] = time().'.'.$request->images_slider->getClientOriginalExtension();
        // Move Folder
        $request->images_slider->move(public_path('slider'), $input['images_slider']);
        
        UpdateSlider::create($input);
        return response()->json(['success'=>'done']);

      }

      return response()->json(['error'=>$validator->errors()->all()]);

    }

    function EditSlider(Request $Req){

      $EditSlider = UpdateSlider::find($Req->id_slider);
      $EditSlider->nama_slider = $Req->nama_slider;

      if(isset($_POST['EditChooseImageSlider'])){

      }
      else{
          $temp = explode(".", $_FILES["EditChooseImageSlider"]["name"]);
          $newfilename = round(microtime(true)) . '.' . end($temp);
          $EditSlider->Images_Slider = $newfilename;
         
          // Move Folder  
          move_uploaded_file($_FILES["EditChooseImageSlider"]["tmp_name"],"sas/public/slider/" . $newfilename);
      }
      
      $EditSlider->sort_slider = $Req->sort_slider;
      $EditSlider->active_slider = $Req->active_slider;
      $EditSlider->nama_user = $Req->nama_user;

      $EditSlider->save();


    }

        function DestroySlider($id){

        $UpdateSlider = new UpdateSlider;
        $UpdateSlider = UpdateSlider::find($id);
        $UpdateSlider->delete($id);

    }

}


