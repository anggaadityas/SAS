<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Response;
use Datatables;

class AddAdminController extends Controller
{
    
	public function AddAdmin(){
    	return view('admin.pages.addadmin');
    }


    public function ListAdmin(Request $req){

    	if($req->ajax()){

    		$listadmin = DB::table('users')
    		->leftjoin('user_role','users.id','=','user_role.user_id')
    		->leftjoin('roles','user_role.role_id','=','roles.id')
    		->select('users.id','users.first_name','users.last_name','users.email','users.password','users.created_at','users.active','users.created_by','user_role.role_id','roles.name')
    		->get();
    		return Datatables::of($listadmin)
    		   ->addColumn('nama_user', function($listadmin) {
                    $nama_user = $listadmin->first_name ." " .$listadmin->last_name;

                    return $nama_user;
                })
    		// tambah kolom untuk aksi edit dan hapus
                    ->addColumn('action', function($listadmin) {
                    return '<a href="#" class="modal-edituser" title="view"  data-id="'.$listadmin->id.'" data-namadepan="'.$listadmin->first_name.'" data-namabelakang="'.$listadmin->last_name.'" data-email="'.$listadmin->email.'"><i class="fa fa-eye" aria-hidden="true"></i>
				          	</a> &nbsp
                    <a href="#" class="destroyuser" data-id="'.$listadmin->id.'" title="hapus">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>';
                })
                  ->addColumn('status', function($listadmin) {
                  	
                  	if($listadmin->active == 1){
                  		$statusactive = 'Active';
                  	}
                  	else{
                  		$statusactive = 'Non Active';
                  	}

                  		return $statusactive;
                })

                	->make(true);
                } else{
                	exit("Not an Ajax request");
                }
    	}

      public function AddUser(Request $req){

          $id = DB::table('users')->insertGetId([
            'first_name' => $req->namadepan,
            'last_name' => $req->namabelakang,
            'email' => $req->email,
            'password' => password_hash($req->password,PASSWORD_DEFAULT),
            'active' => $req->status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_by' =>  session('username')
            ]);

            DB::table('user_role')->insert([
            'user_id' => $id,
            'role_id' => $req->role,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);

          return 'Data User Berhasil Ditambahkan';

      }

      public function ProsesEditUser(Request $req){

                try {

                $updateuser = DB::table('users')
                ->where('id', $req->id)
                ->update(['first_name' =>$req['namadepan'],
                'last_name'=>$req['namabelakang'],
                'email'=>$req['email'],
                'active'=>$req['status']
                ]);

                 $updateuser = DB::table('user_role')
                ->where('user_id', $req->id)
                ->update(['role_id' =>$req['role']
                ]);

                return 'Data user berhasil diupdate';
                  
                } catch (Exception $e) {
                    
                    return 'Error';
                }
      }

      public function DestroyUser($id){

         $destroyuser = DB::table('users')->where('id',$id)->delete();

        return 'ok';

      }

}
