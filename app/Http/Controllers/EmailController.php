<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    public function mail(Request $request)
    {
        Mail::to($request->user())->send(new MailableClass);

    }
}
