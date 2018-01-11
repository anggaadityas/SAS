<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryKaryawanController extends Controller
{
    
	public function HistoryKaryawan(){
    	return view('admin.pages.historykaryawan');
    }

}
