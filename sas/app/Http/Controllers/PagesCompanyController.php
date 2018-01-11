<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesCompanyController extends Controller
{
    public function Welcome(){
		return view('welcome');
	}
}
