<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobMail;

use RealRashid\SweetAlert\Facades\Alert;

class EmailController extends Controller
{
    public function mail(Request $request)
    {
      

       $data = array(
           'job_id'=> $request->get('job_id'),
           'your_name' => $request->get('your_name'), 
           'your_email' => $request->get('your_email'), 
           'friend_name' => $request->get('friend_name'), 
           'friend_email' => $request->get('friend_email'), 
          
        );
        

       Mail::to($request->get('friend_email'))->send(new JobMail($data));
       Alert::toast('Job sent Successfull! ','success');
        return redirect()->back();

    }
}
