<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Catgeory;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Catgeory::all();
        return view('admin.category',compact('data'));
    }
    public function manage_category($id = '')
    {
        if($id>0){
            $data= Catgeory::find($id);
            // echo "<pre>";
            // // print_r($data);
            // print_r($data->category_name);

            // die();

           $res['category_name'] =  $data->category_name;
            $res['category_slug'] = $data->category_slug;
            $res['id'] = $data->id;


        }else{

           
         
            $res['category_name'] =  '';
            $res['category_slug'] =  '';
            $res['id'] =  '';
          
        }
        return view('admin.manage_category',compact('res'));
    }

    public function manage_category_process(Request $request)
    {

        // return ($request->post());
        // die();\


        // $rules = [
        //     'category_name' =>'required',
        // ];
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:catgeories,category_slug,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $data = Catgeory::find($request->post('id'));
           

        }else{
            $data = new Catgeory;
            
        }
        $data->category_name = $request['category_name'];
        $data->category_slug = $request['category_slug'];
        $data->status = 1;
        
        $data->save();
        return redirect('admin/category');
    }

    //  to delete category


    public function delete($id){
        $data = Catgeory::find($id);
        if(!is_null($data)){
            $data->delete();
            session()->flash('message', 'Category deleted successfully!');
            return redirect('admin/category');
        }else{
            session()->flash('message', 'Category not found!');
            return redirect('admin/category');
        }
    }

    
    public function status(Request $request,$status,$id){

    $data = Catgeory::find($id);
    $data->status  = $status;
    $data->save();
    return redirect('admin/category')->with('message','status changed successfully!');


    }

    public function getallcat(){

        $data = DB::table('catgeories')->get();
        // $users = DB::table('users')->get();
        return response()->json(['data'=>$data,'success'=>true]);
    }
}
//  edit part not done of categort section