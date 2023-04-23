<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstrukturModel;
use DataTables;
 


class instrukturController extends Controller
{
   
    public function index(){
        return view('instruktur');
    }

    public function save(Request $request){ 
       
        if($request->id == NULL || $request->id == ''){ 
                $instruktur = new \App\Models\InstrukturModel();
                $instruktur->instruktur = $request->instruktur; 
                $instruktur->save();  
        }else{ 
                \DB::table('instruktur')->where('id',$request->id)->update([
                    'instruktur' => $request->instruktur
                ]);
                
        }
      
    }

    public function datalist(Request $request){ 
        if ($request->ajax()) {
            $data = InstrukturModel::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" onclick="UbahData('.$row->id.');" class="edit btn btn-success btn-sm"> Edit</a> 
                    <a href="javascript:void(0)" onclick="DeleteData('.$row->id.');" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
 

    public function destroy(Request $request){
        $id  = $request->id;
        $instruktur = InstrukturModel::findOrFail($id);
  
        //delete post
        $instruktur->delete();

    }  

    public function get_data(Request $request){
        $id = $request->id;
        $instruktur = InstrukturModel::where('id',$id)->first();
        return $instruktur;
    }
     
}
