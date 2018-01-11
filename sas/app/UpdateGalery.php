<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateGalery extends Model
{
    public $timestamps = false;
	protected $primaryKey = 'id_galery';
    protected $table = "tb_galery";
    protected $fillable = ['nama_galery', 'images_galery','id_kategori', 'sort_galery', 'active_galery','create_galery','modif_galery','nama_user'];
}
