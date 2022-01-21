<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AdminController extends Controller
{
    //dashboard
    public function index(){
        return view('index');
    }
    //login
    public function login(){
        return view('login');
    }
    //submit login
    public function submit_login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:3'
        ]);
        $checkAdmin=Admin::where(['email'=>$request->email,'password'=>$request->password])->count();
        if($checkAdmin>0){
            session(['adminLogin',true]);
            return redirect('/company');
        }else{
            return redirect('admin/login')->with('msg','Invalid email/password!!');
        }
    }
//logout
public function logout(){
    session()->forget('adminLogin');
    return redirect('admin/login');
}

    

//     // if (!$userInfo) {
//     //     return back()->with('fail', 'Email address does not exist!');
//     // } else {
//     //     if (Hash::check($request->password, $userInfo->password)) {
//     //         // $request->session()->put('LoggedUser', $userInfo->id);
//     //         return redirect('admin');
//     //     } else {
//     //         return back()->with('fail', 'password incorrect');
//     //     }
//     // }
// }
}
