<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesAdminController extends Controller
{

	public function Admin(){
    	return view('admin.login');
    }

    public function pagenotfound(){
    	return view('admin.errors.404');
    }

}
