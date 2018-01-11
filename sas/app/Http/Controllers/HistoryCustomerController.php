<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryCustomerController extends Controller
{
    
	public function HistoryCustomer(){
    	return view('admin.pages.historycustomer');
    }
    
}
