<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    //

    public function index(){
        return view('member');
    }

    public function save(Request $request){ 
       
        $destinationPath = 'uploads';
        $posting_foto = $request->file('foto'); 
        $member = new \App\Models\MemberModel();
        $member->title = $request->title;
        $member->barcode = $request->barcode; 
        $member->member_name = $request->member_name;  
        $member->foto = $request->file('foto')->getClientOriginalName(); 
        $posting_foto->move($destinationPath,$posting_foto->getClientOriginalName());
        $member->save();
    }

    public function add_form(){
        echo 1;
    }
}
