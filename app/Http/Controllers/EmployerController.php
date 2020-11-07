<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class EmployerController extends Controller
{
    public function registration(Request $request){
        $user = new User();
        $this->validate($request,[
            'cname' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
        ]);


       
        $user->email =$request->email;
        $user->user_type ='employer';
        $user->password =bcrypt($request->password);
        $user->save();

        $company = new Company();

        $company->cname = $request->cname;
        $company->slug = Str::slug($request->cname);
        $company->user_id = $user->id;   
        $company->save();
        
        Alert::toast('Registration Successfull! please login','success');
        return redirect()->back();

    }
    public function login(Request $request)
    {
        $this->validate($request,[
           
            'email'=>'required',
            'password'=>'required|min:6',
       ]);


     $credential= $request->only(['email','password']);

    //dd( Auth::attempt($credential));
       if(Auth::attempt($credential))
       {
        Alert::toast('Login Successfully!','success');
        return redirect('/');
       }else{
        Alert::toast('Login Failed! Provide valid information','warning');
        return redirect()->back();
       }
     
     
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
     
     
    }
}
