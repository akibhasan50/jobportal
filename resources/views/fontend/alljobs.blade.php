@extends('fontend.master')
@section('content')
    
<div class="container">
   
    <div id="titlebar">
        <div class="container">
            <div class="ten columns">
                <h1 class="margin-bottom-25">All Jobs</h1>
            </div>
        </div>
    </div>
    
    <!-- Recent Jobs -->
    <div class="sixteen columns">
        <div class="padding-right">
         	
        <form action="{{route('job.search')}}" method="post" class="list-search">
            @csrf
			<button><i class="fa fa-search"></i></button>
			<input type="text" name="search" placeholder="Search job by title, keywords or company name" value=""/>
			<div class="clearfix"></div>
		</form>
            <ul class="job-list">


            @foreach (App\Models\Job::with('company')->latest()->get()  as $job)
                 <li class="highlighted">
                    <a href="{{route('jobs.show',$job->id)}}">
                        <img src="{{$job->company->logo}}" alt="">
                        <div class="job-list-content"> 
                             <h4>{{$job->title}} <span
                                    
                                    @switch($job->type)
                                        @case('Full-Time')
                                            class="full-time"
                                            @break
                                        @case('Part-Time')
                                            class="part-time"
                                            @break
                                        @case('Internship')
                                            class="internship"
                                            @break
                                        @default
                                           class="full-time" 
                                    @endswitch
                                     
                                     
                                     
                                     >{{$job->type}}</span></h4>
                            <div class="job-icons">
                                <span><i class="fa fa-briefcase"></i> {{$job->company->cname}}</span>
                                <span><i class="fa fa-map-marker"></i> {{$job->address}}</span>
                                <span><i class="fa fa-calendar"></i>{{$job->created_at->diffForHumans()}} </span>
                                
                            </div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                </li>
            @endforeach
               

               
              
            </ul>

            <div class="margin-bottom-55"></div>
        </div>
    </div>

 
</div>


@endsection