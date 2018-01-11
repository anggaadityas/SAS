<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\LoginAdmin;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class LoginAdminController extends Controller
{
     function cekLogin(Request $request){

     	$username = $request->txt_username;
    	$password = $request->txt_password;

    		$check = LoginAdmin::where('email',$username)->count();

    		if(!($check > 0)){
                return redirect('admin')->with('status','salah');
            }
            else{

            // $take = LoginAdmin::where('email',$username)->first();

                $query = 'select * from users inner join user_role on users.id=user_role.user_id where email = ?';

                $take = \DB::SELECT($query,array($username));
      
               if(password_verify($password, $take[0]->password))
                    {

                        session(['username' => $take[0]->first_name]);
                        session(['role_id' => $take[0]->role_id]);
                        session(['password'=> true]);

                        // Navbar role with session

                        // $query ='SELECT * FROM tb_menulist inner join tb_menu on tb_menulist.id_menu=tb_menu.id_menu where role_id = ?';

                        // $navigasi = \DB::SELECT($query,array($take[0]->role_id));

                        // session(['nav' => $navigasi]);

                        Auth::attempt(['email' => $username, 'password' => $password]);

                        return redirect('dashboard');
                    }else{
                       
                       return redirect('admin')->with('status','salah'); 
                    }
        }
     }

     public function logout(Request $Req){
        
        $Req->session()->regenerate();
        $Req->session()->flush();

        return redirect('/');
     }

}
