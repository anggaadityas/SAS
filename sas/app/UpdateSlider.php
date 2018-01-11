<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateSlider extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id_slider';
    protected $table = "tb_slider";
    protected $fillable = ['nama_slider', 'images_slider', 'sort_slider', 'active_slider','create_slider','modif_slider','nama_user'];
}
