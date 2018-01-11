<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginKaryawan extends Model
{
    protected $table = 'tb_login_karyawan';
    public $fillable = ['no_ktp','email','password'];
}
