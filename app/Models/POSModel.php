<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POSModel extends Model
{
    use HasFactory;

    protected $table = "t_pos";
    protected $fillable = [
        'id', 'no_trans', 'id_member', 'id_member_referal', 'id_marketing_referal', 'visit_type', 'date_trans', 'diskon', 'id_payment', 'id_cc', 'id_debit', 'account_no', 'total_payment', 'change_payment', 'cc_charge'
    ];


    public static function get_no()
    {
        $data = \DB::table('t_pos')
            ->selectRaw('substr(max(no_trans),-7) as id')
            ->get();

        return $data;
    }
}
