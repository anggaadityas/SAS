<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListJobController extends Controller
{
    
	public function ListJob(){
    	return view('admin.pages.listjob');
    }

}
