<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.login');
    }


    public function auth(Request $request){

        // return($request->all());
        // die();
            $email = $request['email'];
            $password = $request['password'];
            $data = Admin::where(['email'=> $email,'password'=>$password])->get();
            if(isset($data['0']->id)){
                $request->session->put('ADMIN_LOGIN',true);
                $request->session->put('ADMIN_ID',$request['0']->id);
                return redirect('admin/dashboard');

            }else{

                $request->session()->flash('error','Enter Correct Details');
                return redirect('/login');

            }

    }

}
