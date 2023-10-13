<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\LoginRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginRepository implements LoginRepositoryInterface
{

    public function index()
    {
        return view('Hospital.pages.login.index');
    }

    public function login($request)
    {
       if(Auth::attempt(['user_name'=>$request->user_name,'password'=>$request->password,'status'=>'مفعل'],$request->remmber))
       {
           return redirect()->route('hospital.home');
       }
       return redirect()->route('hospital.login.index')->withInput()->with(['msg'=>'هناك خطأ في اسم المستخدم او الباسورد']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('hospital.login.index');
    }
}
