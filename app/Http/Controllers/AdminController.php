<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){

        }else{
            $request->session()->flash('error','Access Denied');
            return redirect('/login');
        }
        
        return view('admin.login');
    }


    public function auth(Request $request){

        // return($request->all());
        // die();
            $email = $request['email'];
            $password = $request['password'];

            $data = Admin::where(['email'=> $email])->first();
            if($data){

                if(Hash::check($request->password,$data->password)){
                    $request->session()->put('ADMIN_LOGIN',true);
                    $request->session()->put('ADMIN_ID',$data->id);
                    return redirect('admin/dashboard');


                }else{
                    $request->session()->flash('error','Enter Correct Password');
                    return redirect('/login');



                }
               
            }else{
              
                $request->session()->flash('error','Enter Correct Email');
                return redirect('/login');
            }

    }



    public function updatepass(){
        $data = Admin::find(1);
        $data->password = Hash::make('123');
        $data->save();

    }

    //  for dashboard


    public function dashboard(){
        return view('admin.dashboard');
    }


    public  function logout(){
        session()->forget(['ADMIN_LOGIN', 'ID']);
         return redirect('/login')->with('error','Successfully Logged out');
    }
}
