<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POSModel extends Model
{
    use HasFactory;
    
    public static function get_no(){ 
        $data = \DB::table('t_pos')
        ->selectRaw('substr(max(trans_code),-7) as id')
        ->get();
   
        return $data;
   } 
}
