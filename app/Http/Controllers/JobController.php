<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with('company')->latest()->limit(10)->get();
        $categories = Category::limit(8)->get();
     return view('fontend.index',compact('jobs','categories'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fontend.addjob');
    }
    public function manage()
    {
        $id = Auth::user()->id;
        $jobs = Job::where('user_id',$id)->get();
        return view('fontend.managejob',compact('jobs'));
    }
    public function saveJob()
    {
        $jobs =Auth::user()->favourits;
        return view('fontend.favourite',compact('jobs'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $job = new Job();
        $job->user_id =  Auth::user()->id;
        $job->company_id = Auth::user()->company->id;
        $job->title = $request->title;
        $job->slug = Str::slug($request->title);
        $job->roles = $request->roles;
        $job->description = $request->description;
        $job->position = $request->position;
        $job->category_id = $request->category;
        $job->address = $request->address;
        $job->type = $request->type;
        $job->status = $request->status;
        $job->last_date = $request->last_date;

        $job->save();
        if($job->save()){
            Alert::toast('New job added successfully','success');
        }
       
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job,$id)
    {
        $job = Job::with('company')->Find($id);
        

        return view('fontend.jobdetails',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job,$id)
    {
        $job = Job::Find($id);
        return view('fontend.updatejob',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $job = Job::Find($id);
  
        $job->title = $request->title;
        $job->slug = Str::slug($request->title);
        $job->roles = $request->roles;
        $job->description = $request->description;
        $job->position = $request->position;
        $job->category_id = $request->category;
        $job->address = $request->address;
        $job->type = $request->type;
        $job->status = $request->status;
        $job->last_date = $request->last_date;

        $job->save();
        if($job->save()){
            Alert::toast('job updated successfully','success');
        }
       
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job,$id)
    {
        $job = Job::destroy($id);
        Alert::toast('job deleted successfully','warning');
        return redirect()->back();
        
    }
    public function apply(Request $request,$id)
    {
        $jobId = Job::Find($id);
        $jobId->users()->attach(Auth::user()->id);

        Alert::toast('Applied successfully','success');
        return redirect()->back();
        
    }
    public function favourite(Request $request,$id)
    {
        $FavjobId = Job::Find($id);
       $FavjobId->favourits()->attach(Auth::user()->id);
        
        Alert::toast('Added to Favourite successfully','success');
        return redirect()->back();
        
    }
    public function unfavourite(Request $request,$id)
    {
        $FavjobId = Job::Find($id);
        $FavjobId->favourits()->detach(Auth::user()->id);

        Alert::toast('Removed from Favourite List','success');
        return redirect()->back();
        
    }
    public function applicants()
    {
        $applicants = Job::has('users')->where('user_id',Auth::user()->id)->get();
        return view('fontend.manageapplicants',compact('applicants'));
        
    }
    public function jobByCategory($id)
    {
        $jobs = Job::with('company')->where('category_id',$id)->get();
        $category = Category::where('id',$id)->first();
        return view('fontend.jobbycat',compact('jobs','category'));
    }
    public function jobSearch(Request $request)
    {
        $search = $request->search;
        $jobs = Job::join('companies','jobs.company_id','companies.id')
        ->where('title','LIKE',"%$search%")
        ->orWhere('cname','LIKE',"%$search%")
        ->orWhere('roles','LIKE',"%$search%")
        ->orWhere('position','LIKE',"%$search%")
        ->get();

        return view('fontend.search',compact('jobs'));
        
    }

    public function search(Request $request)
    {
        $search1 = $request->search1;
     

      
        
        $jobs =Job::join('companies','jobs.company_id','companies.id')
        ->where('title','LIKE',"%$search1%")
        ->orWhere('cname','LIKE',"%$search1%")
        ->orWhere('roles','LIKE',"%$search1%")
        ->orWhere('position','LIKE',"%$search1%")
    
        ->get();

    
        return view('fontend.search',compact('jobs'));
    }
}
