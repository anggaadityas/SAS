<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddJobController extends Controller
{
    
	public function AddJob(){
    	return view('admin.pages.addjob');
    }
    
}
