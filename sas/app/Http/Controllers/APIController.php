<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIController extends Controller
{
    
    public function Generate($id, $kode, $tbName)
    {

        $sql = "SELECT MAX(RIGHT(". $id . ", 4)) AS max_id FROM " . $tbName . " ORDER BY ". $id . "";
        $stmt = DB::SELECT($sql);

        $id = $stmt[0]->max_id;
        $sort_num = (int) substr($id, 1, 6);
        $sort_num++;
        $new_code = sprintf("$kode%04s", $sort_num);

        return $new_code;
    }

}
