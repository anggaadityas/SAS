<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$role_user = Role::where('name','User')->first();
    	$role_author = Role::where('name','Author')->first();
    	$role_admin = Role::where('name','Admin')->first();
        

        $user = new User();
        $user->first_name ='Denis';
        $user->last_name = 'Visitor';
        $user->email = 'denis@gmail.com';
        $user->password = password_hash('visitor', PASSWORD_DEFAULT);
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->first_name ='Angga';
        $admin->last_name = 'Admin';
        $admin->email = 'angga@gmail.com';
        $admin->password = password_hash('admin', PASSWORD_DEFAULT);
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->first_name ='Utari';
        $author->last_name = 'Author';
        $author->email = 'author@gmail.com';
        $author->password = password_hash('author', PASSWORD_DEFAULT);
        $author->save();
        $author->roles()->attach($role_author);


    }
}
