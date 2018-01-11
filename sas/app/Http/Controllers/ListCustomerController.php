<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;

class ListCustomerController extends Controller
{
    
	public function ListCustomer(){
    	return view('admin.pages.listcustomer');
    }

    public function ListDataCustomer(Request $req){

    	if($req->ajax()){

    		$datalistcustomer = DB::table('tb_perusahaan')
    				->get();

    			return Datatables::of($datalistcustomer)
    			->addColumn('contactperson', function($datalistcustomer) {

    				$contactperson = $datalistcustomer->contact_person. ' | ' .$datalistcustomer->email. '';

                    return $contactperson;
                })
    			  ->addColumn('action', function($datalistcustomer) {
                    return '<a href="/sas/detaillistdatacustomer/'.$datalistcustomer->kode_perusahaan.'"><i class="fa fa-eye" aria-hidden="true"></i>
				          	</a>';
                })
    			  ->make(true);

    	}else{

    		exit('Not Ajax Request');

    	}

    }

    public function DetailListDataCustomer($id){

    	$querydataperusahaan = "SELECT * FROM tb_perusahaan WHERE kode_perusahaan = ?";

    	$detailperusahaan = DB::SELECT($querydataperusahaan,array($id));

    		return view('admin.pages.detaillistcustomer',compact('detailperusahaan'));

    }

}
