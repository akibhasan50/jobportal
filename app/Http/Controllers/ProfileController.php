<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fontend.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $this->validate($request,[
            'address' => 'required|min:3',
            'phone' => 'required|numeric',
            'professional_title' => 'required',
            'bio' => 'required',
            'cover_leter' => 'required',
            'experience' => 'required',
            'resume' => 'required|mimes:pdf|max:20000',
        ]);
        $id = Auth::user()->profile->id;
        $profile = Profile::findOrFail($id);

        $profile->address = $request->address;
        $profile->phone = $request->phone;
        $profile->professional_title = $request->professional_title;
        $profile->experience = $request->experience;
        $profile->bio = $request->bio;
        $profile->phone = $request->phone;
        $profile->cover_leter = $request->cover_leter;
      
        $resume = $request->file('resume');
        $avater = $request->file('avater');
 

        if($request->hasFile('resume')){
            $extention = strtolower($resume->getClientOriginalExtension());
            $filename = time().'.'.$extention;
            $imgpath =$imgpath ='uploads/resume/';
            $imgurl= $imgpath.$filename;
            $profile->resume =$imgurl;

            $success=  $resume->move($imgpath,$filename);

            if($request->oldimg != null){
                unlink($request->oldimg);
            }
        }
        if($request->hasFile('avater')){
            $extention = strtolower($avater->getClientOriginalExtension());
            $filename = time().'.'.$extention;
            $imgpath =$imgpath ='uploads/images/';
            $imgurl= $imgpath.$filename;
            $profile->avater =$imgurl;

            $success=  $avater->move($imgpath,$filename);

            if($request->oldavater != null){
                unlink($request->oldavater);
            }
        }
       
       

         $profile->save();

         Alert::toast('Profile updated successfully','success');
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    // protected function unlink($file)
    // {
    //     $pathToUpload = 
    //     if($file != '' && file_exist($pathToUpload.$file)){
    //         @unlink($pathToUpload.$file);
    //     }
    // }
 
}
