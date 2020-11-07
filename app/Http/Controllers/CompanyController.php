<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $company = Company::Find($id);
        
        return view('fontend.company',compact('company'));
    }


    public function profile()
    {
        return view('fontend.companyprofile');
    }

  
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->validate($request,[
            'cname' => 'required',
            'slogun' => 'required',
            'address' => 'required|min:3',
            'phone' => 'required|numeric|min:10',
            'website' => 'required',
            'description' => 'required',
            'logo' => 'required|mimes:jpg,png,jpeg|max:2000',
           
        ]);
        $id = Auth::user()->company->id;
        $company = Company::findOrFail($id);

        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->website = $request->website;
        $company->description = $request->description;
        $company->slogun = $request->slogun;
    
        $logo = $request->file('logo');
        $cover = $request->file('cover_photo');
 

        if($request->hasFile('logo')){
            $company->logo = $this->storeImage($logo);

            if($request->oldlogo != null){
                unlink($request->oldlogo);
            }
        }
        if($request->hasFile('cover_photo')){
             $company->cover_photo  = $this->storeImage($cover);
           
            if($request->oldcover != null){
                unlink($request->oldcover);
            }
        }

         $company->save();

         Alert::toast('Company info updated successfully','success');
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    public function storeImage($file)
    {
        $extention = strtolower($file->getClientOriginalExtension());
        $filename = time().'.'.$extention;
        $imgpath =$imgpath ='uploads/company/';
        $imgurl= $imgpath.$filename;
        $success=  $file->move($imgpath,$filename);

        return $imgurl;
       

    }

   
}
