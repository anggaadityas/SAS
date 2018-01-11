<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListLoker extends Model
{
    public $timestamps = false;
	protected $primaryKey = 'id_loker';
    protected $table = "tb_loker";
    protected $fillable = ['id_kategori','judul_loker', 'job_description','requirements','salary_loker','area_loker','minpengalaman_loker','create_loker','modif_loker','nama_user'];
}
