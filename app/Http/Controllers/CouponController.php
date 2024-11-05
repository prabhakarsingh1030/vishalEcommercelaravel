<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
   

    public function index()
    {
        $data = Coupon::all();
        return view('admin.coupon',compact('data'));
    }
    public function manage_coupon($id = '')
    {
        if($id>0){
            $data= Coupon::find($id);
            

           $res['title'] =  $data->title;
            $res['code'] = $data->code;
            $res['value'] = $data->value;
            $res['id'] = $data->id;


        }else{

           
         
            $res['title'] =  '';
            $res['code'] =  '';
            $res['value'] =  '';
            $res['id'] =  0;
          
        }
        return view('admin.manage_coupon',compact('res'));
    }

    public function manage_coupon_process(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'code' => 'required|unique:coupons,code,'.$request->post('id'),
            'value' => 'required',
        ]);

        if($request->post('id')>0){
            $data = Coupon::find($request->post('id'));
        }else{
            $data = new Coupon;

        }
        $data->title = $request['title'];
        $data->code = $request['code'];
        $data->value = $request['value'];
        $data->status = 1;
        $data->save();
        return redirect('admin/coupon');
    }

    //  to delete coupon


    public function delete($id){
        $data = Coupon::find($id);
        if(!is_null($data)){
            $data->delete();
            session()->flash('message', 'coupon deleted successfully!');
            return redirect('admin/coupon');
        }else{
            session()->flash('message', 'coupon not found!');
            return redirect('admin/coupon');
        }
    }

    
    public function status(Request $request,$status,$id){

        $data = Coupon::find($id);
        $data->status  = $status;
        $data->save();
        return redirect('admin/coupon')->with('message','status changed successfully!');
    }

}
