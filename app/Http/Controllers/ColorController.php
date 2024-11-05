<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
   




    public function index()
    {
        $data = Color::all();
        return view('admin.color',compact('data'));
    }
    public function manage_color($id = '')
    {
        if($id>0){
            $data= Color::find($id);
            // echo "<pre>";
            // // print_r($data);
            // print_r($data->color);

            // die();

           $res['color'] =  $data->color;
            $res['status'] = $data->status;
            $res['id'] = $data->id;


        }else{

           
         
            $res['color'] =  '';
            $res['status'] =  '';
            $res['id'] =  '';
          
        }
        return view('admin.manage_color',compact('res'));
    }

    public function manage_color_process(Request $request)
    {

       
        $request->validate([
           
            'color' => 'required|unique:colors,color,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $data = Color::find($request->post('id'));
        

        }else{
            $data = new Color;
           

        }
        $data->color = $request['color'];
        $data->status = 1;
       
        $data->save();
        return redirect('admin/color');
    }

    //  to delete color


    public function delete($id){
        $data = Color::find($id);
        if(!is_null($data)){
            $data->delete();
            session()->flash('message', 'color deleted successfully!');
            return redirect('admin/color');
        }else{
            session()->flash('message', 'color not found!');
            return redirect('admin/color');
        }
    }

    
    public function status(Request $request,$status,$id){

    $data = Color::find($id);
    $data->status  = $status;
    $data->save();
    return redirect('admin/color')->with('message','status changed successfully!');


    }







}
