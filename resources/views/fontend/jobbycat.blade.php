@extends('fontend.master')
@section('content')
    
<div class="container">

    <!-- Recent Jobs -->
    <div class="sixteen columns">
        <div class="padding-right">
        <h2 class="margin-bottom-25"> <strong>Category :</strong> {{$category->name}}</h2>
           @if($jobs->count() > 0)
           <p>Total {{$jobs->count()}} jobs found in this category</p>
           @else

           <h1 style="color:red;">Sorry no jobs available in this category</h1>
           @endif
     
            <ul class="job-list">


                @foreach ($jobs  as $job)
                 <li class="highlighted">
                    <a href="{{route('jobs.show',$job->id)}}">
                        <img src="{{$job->company->logo}}" alt="">
                        <div class="job-list-content">
                            <h4>{{$job->title}} <span class="full-time">{{$job->type}}</span></h4>
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