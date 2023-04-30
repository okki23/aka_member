<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data = EmployeeModel::findOrfail(Auth::user()->id)->first();
        $data = \DB::table('employee')->where('id','=',Auth::user()->id_employee)->first();
        return view('home',['data'=>$data]);
    }
}
