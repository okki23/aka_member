<?php

namespace App\Http\Controllers;

use App\Models\POSModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class POSController extends Controller
{
    //
    public function index(){
        $faktur = $this->getmax();
        $data = \DB::table('employee')->where('id','=',Auth::user()->id_employee)->first();
        $marketing_ref = \DB::table('employee')->get();
        $member_ref = \DB::table('member')->get();
        return view('pos',['data'=>$data,'faktur'=>$faktur,'marketing_ref'=>$marketing_ref,'member_ref'=>$member_ref]);
    }



    public function getmax($param = '') {
        $data = POSModel::get_no();
        $lastid = $data[0]->id;

        if($lastid == '') { // bila data kosong
            $ID = $param . "0000001";
        }else {
            $MaksID = $lastid;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }
}
