<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    public function mail(Request $request)
    {
       $jobId = $request->get('job_id');

       $data = array(
           'your_name' => $request->get('your_name'), 
           'your_email' => $request->get('your_email'), 
           'friend_name' => $request->get('friend_name'), 
           'friend_email' => $request->get('friend_email'), 
          
        );

        return $data;

    }
}
