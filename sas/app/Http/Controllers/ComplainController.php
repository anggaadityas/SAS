<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplainController extends Controller
{
    
	public function Complain(){
    	return view('admin.pages.complain');
    }

}
