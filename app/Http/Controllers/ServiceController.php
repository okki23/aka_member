<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceModel;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{
   
    public function index(){
        $data = \DB::table('employee')->where('id','=',Auth::user()->id_employee)->first();
        return view('service',['data'=>$data]);
    }

    public function save(Request $request){ 
       
        if($request->id == NULL || $request->id == ''){
            
            $destinationPath = 'uploads';
            $posting_foto = $request->file('foto'); 

            if($posting_foto == NULL || !$posting_foto || $posting_foto == ''){
                $service = new \App\Models\ServiceModel();
                $service->title = $request->title;
                $service->barcode = $request->barcode; 
                $service->service_name = $request->service_name; 
                $service->id_number = $request->service_name; 
                $service->dob = $request->dob; 
                $service->pob = $request->pob; 
                $service->phone = $request->phone; 
                $service->gender = $request->gender; 
                $service->email = $request->email; 
                $service->address = $request->address; 
                $service->emer_contact = $request->emer_contact; 
                $service->referal = $request->referal;  
              
                $service->save();
            }else{
                $service = new \App\Models\ServiceModel();
                $service->title = $request->title;
                $service->barcode = $request->barcode; 
                $service->service_name = $request->service_name; 
                $service->id_number = $request->service_name; 
                $service->dob = $request->dob; 
                $service->pob = $request->pob; 
                $service->phone = $request->phone; 
                $service->gender = $request->gender; 
                $service->email = $request->email; 
                $service->address = $request->address;
                $service->emer_contact = $request->emer_contact; 
                $service->referal = $request->referal;  
                $service->foto = $request->file('foto')->getClientOriginalName(); 
                $posting_foto->move($destinationPath,$posting_foto->getClientOriginalName()); 
                $service->save();
            }
         
 
        }else{
                $posting_foto = $request->file('foto');  
                $destinationPath = 'uploads'; 
                if($posting_foto == NULL || !$posting_foto || $posting_foto == ''){
                \DB::table('service')->where('id',$request->id)->update([
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'address' => $request->address,
                    'emer_contact' => $request->emer_contact,
                    'referal' => $request->referal,  
                ]);
               
            }else{
                \DB::table('service')->where('id',$request->id)->update([
                    'title' => $request->title,
                    'barcode' => $request->barcode,
                    'service_name' => $request->service_name,
                    'id_number' => $request->id_number,
                    'dob' => $request->dob,
                    'pob' => $request->pob,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'address' => $request->address,
                    'emer_contact' => $request->emer_contact,
                    'referal' => $request->referal,
                    'foto' => $request->file('foto')->getClientOriginalName(), 
                ]);
                $posting_foto->move($destinationPath,$posting_foto->getClientOriginalName());
            }
            
        }
      
    }

    public function datalist(Request $request){ 
        if ($request->ajax()) {
            $data = ServiceModel::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.url('/service_kartu/'.$row->id).'" target="_blank" class="edit btn btn-warning btn-sm"> Kartu</a> <a href="javascript:void(0)" onclick="UbahData('.$row->id.');" class="edit btn btn-success btn-sm"> Edit</a> 
                    <a href="javascript:void(0)" onclick="DeleteData('.$row->id.');" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getdata(){
        
    }

    public function destroy(Request $request){
        $id  = $request->id;
        $service = ServiceModel::findOrFail($id);

        //delete image
        Storage::delete('public'. $service->foto);

        //delete post
        $service->delete();

    } 
    public function add_form(){
        echo(rand(50000,80000));
    }

    public function get_data(Request $request){
        $id = $request->id;
        $service = ServiceModel::where('id',$id)->first();
        return $service;
    }
    
    public function kartu($id){
        $data = ServiceModel::findOrfail($id); 
        return view ('kartu',['data'=>$data]);
        // $pdf = PDF::loadView('kartu');
       
        // return $pdf->download('kartu.pdf'); 
    }
}
