<?php

namespace App\Http\Controllers;

use App\Models\POSModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Riskihajar\Terbilang\Terbilang;
use Illuminate\Support\Facades\Config;
use PDF;

class POSController extends Controller
{
    //
    public function index()
    {
        $faktur = $this->getmax();
        $data = \DB::table('employee')->where('id', '=', Auth::user()->id_employee)->first();
        $marketing_ref = \DB::table('employee')->get();
        $member_ref = \DB::table('member')->get();
        return view('pos', ['data' => $data, 'faktur' => $faktur, 'marketing_ref' => $marketing_ref, 'member_ref' => $member_ref]);
    }


    public function cetakinv(Request $request)
    {
        // $lang = $_POST['lang'];
        // $id_member_referal = $request->post('id_member_referal');
        // $idservices = $request->post('idservices');
        // $fakturno = $request->post('fakturno');
        // $id_member = $request->post('id_member');
        // $id_marketing = $request->post('id_marketing');

        //send to post table
        $posdb = new POSModel;

        $posdb->id_payment = $request->tipebayar;
        if ($request->id_payment == 2 || $request->id_payment ==  3) {
            $posdb->no_trans = $request->fakturno;
            $posdb->visit_type = $request->visit_type;
            $posdb->date_trans = $request->date_trans;
            $posdb->basicprice = $request->basicprice;
            $posdb->id_member = $request->id_member;
            $posdb->id_member_referal = $request->id_member_referal;
            $posdb->id_marketing_referal = $request->id_marketing_referal;
            $posdb->id_payment = $request->tipebayar;
            $posdb->change_payment = 0;
            $posdb->total_payment = $request->total_payment;
            $posdb->payment = $request->total_payment;
            $posdb->diskon = $request->diskon;
            $posdb->id_debit = $request->id_debit;
            $posdb->cc_charge = $request->cc_charge;
            $posdb->id_cc = $request->id_cc;
            $posdb->save();
        } else {
            $posdb->no_trans = $request->fakturno;
            $posdb->visit_type = $request->visit_type;
            $posdb->basicprice = $request->basicprice;
            $posdb->date_trans = $request->date_trans;
            $posdb->id_member = $request->id_member;
            $posdb->id_member_referal = $request->id_member_referal;
            $posdb->id_marketing_referal = $request->id_marketing_referal;
            $posdb->id_payment = $request->tipebayar;
            $posdb->total_payment = $request->total_payment;
            $posdb->payment = $request->payment;
            $posdb->change_payment = $request->change_payment;
            $posdb->diskon = $request->diskon;
            $posdb->id_debit = $request->id_debit;
            $posdb->cc_charge = $request->cc_charge;
            $posdb->id_cc = $request->id_cc;
            $posdb->save();
        }


        //send to post detail

        // dd($idservices);
    }

    function fungsikata($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->fungsikata($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = $this->fungsikata($nilai / 10) . " puluh" . $this->fungsikata($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->fungsikata($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->fungsikata($nilai / 100) . " ratus" . $this->fungsikata($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->fungsikata($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->fungsikata($nilai / 1000) . " ribu" . $this->fungsikata($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->fungsikata($nilai / 1000000) . " juta" . $this->fungsikata($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->fungsikata($nilai / 1000000000) . " milyar" . $this->fungsikata(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->fungsikata($nilai / 1000000000000) . " trilyun" . $this->fungsikata(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    public function kekata(Request $request)
    {
        $angka = $request->post('angka');
        echo $this->fungsikata($angka) . ' Rupiah';
    }

    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(fungsikata($nilai));
        } else {
            $hasil = trim(fungsikata($nilai));
        }
        return $hasil;
    }

    public function getmax($param = '')
    {
        $data = POSModel::get_no();
        $lastid = $data[0]->id;

        if ($lastid == '') { // bila data kosong
            $ID = $param . "0000001";
        } else {
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
