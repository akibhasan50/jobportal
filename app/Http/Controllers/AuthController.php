<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class AuthController extends Controller
{
    public function loginReg(){
        return view('fontend.login');
    }

    public function registration(Request $request){
        $user = new User();
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'dob' => 'required',
            'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
        ]);


        $user->name =$request->name;
        $user->email =$request->email;
        $user->user_type ='seeker';
        $user->password =bcrypt($request->password);
        $user->save();

        $profile = new Profile();

        $profile->user_id = $user->id;
        $profile->dob = $request->dob;
        $profile->gender = $request->gender;

        $profile->save();
        
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
