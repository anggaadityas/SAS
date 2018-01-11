<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class UpdateArtikel extends Model
{

	use Sluggable;

    public $timestamps = false;
	protected $primaryKey = 'id_artikel';
    protected $table = "tb_artikel";
    protected $fillable = ['nama_artikel','slug', 'isi_artikel','images_artikel','id_kategori','active_artikel','create_artikel','modif_artikel','nama_user'];

    public function sluggable()

    {

        return [

            'slug' => [

                'source' => 'nama_artikel'

            ]

        ];

    }
}
