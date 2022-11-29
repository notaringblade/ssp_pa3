<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function register(){
        return view("auth.register");
    }

    public function registerScript(Request $request){
        $request->validate([
            'name'=>'required',
            'gender',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:15',
            'contact'=>'required|min:10|max:10|unique:users',
            'role'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->contact = $request->contact;
        $user->role = $request->role;
        $res = $user->save();

        if($res){
            return back()->with('success','registered succesfully');
        }else{
            return back()->with('fail','unable to register');
        }

    }

    public function loginScript(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15',
        ]);

        $user = User::where('email','=',$request->email)->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                if($user->role == 'employee'){
                    $request -> session()->put('loginId', $user->id);
                    return redirect('dashboard');
                }else{
                    $request -> session()->put('loginId', $user->id);
                    return redirect('mo_dashboard');
                }
                // return back()->with('success','logged in succesfully');
            }else{
                return back()->with('fail','Wrong password');
            }
        }else{
            return back()->with('fail','unable to login');
        }
    }
    
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('employee_dashboard', compact('data'));
    }

    public function mo_dashboard(){

        return view('auth.register');
    }
}
