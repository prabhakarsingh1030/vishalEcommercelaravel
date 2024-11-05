<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    


    public function index()
    {
        $data = Size::all();
        return view('admin.size',compact('data'));
    }
    public function manage_size($id = '')
    {
        if($id>0){
            $data= Size::find($id);
            // echo "<pre>";
            // // print_r($data);
            // print_r($data->size);

            // die();

           $res['size'] =  $data->size;
            $res['status'] = 1;
            $res['id'] = $data->id;


        }else{

           
         
            $res['size'] =  '';
            $res['status'] =  '';
            $res['id'] =  '';
          
        }
        return view('admin.manage_size',compact('res'));
    }

    public function manage_size_process(Request $request)
    {

        
        $request->validate([
           
            'size' => 'required|unique:sizes,size,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $data = Size::find($request->post('id'));
           

        }else{
            $data = new Size;
            

        }
        $data->size = $request['size'];
        $data->status = 1;
       
        $data->save();
        return redirect('admin/size');
    }

    //  to delete size


    public function delete($id){
        $data = Size::find($id);
        if(!is_null($data)){
            $data->delete();
            session()->flash('message', 'size deleted successfully!');
            return redirect('admin/size');
        }else{
            session()->flash('message', 'size not found!');
            return redirect('admin/size');
        }
    }

    
    public function status(Request $request,$status,$id){

    $data = Size::find($id);
    $data->status  = $status;
    $data->save();
    return redirect('admin/size')->with('message','status changed successfully!');


    }






   }
