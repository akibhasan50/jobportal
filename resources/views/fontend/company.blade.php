@extends('fontend.master')
@section('content')
    <!-- Titlebar
================================================== -->
<div id="titlebar" class="photo-bg" style="background-image: url({{asset($company->cover_photo)}});">
	<div class="container">
		<div class="ten columns">
			<h2>Company Details</h2>
		</div>

		<div class="six columns">
			<a href="add-job.html" class="button">Post a Job, It’s Free!</a>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div id="categories">
	<!-- Categories Group -->
	<div class="categories-group">
		<div class="container">
			
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="jumbotron">
                        <h1 class="display-3">{{$company->cname}}</h1>
                        <p class="lead">{{$company->slogun}}</p>
                        <hr class="my-2">
            <ul>
					
					<li>
						<div class="d-flex">
                        
							<h4><strong>Address:</strong></h4>
							<span>{{$company->address}}</span>
						</div>
					</li>
					<li>
						<div class="d-flex">
                        
							<h4><strong>Phone:</strong></h4>
							<span>{{$company->phone}}</span>
						</div>
					</li>
					<li>
						<div class="d-flex">
                        
							<h4><strong>Website:</strong></h4>
							<span>{{$company->website}}</span>
						</div>
					</li>
					<li>
						<div class="d-flex">
                        
							<h4><strong>Description:</strong></h4>
							<span>{{$company->description}}</span>
						</div>
					</li>
				
				
			</ul>
                    </div>
            
                </div>
            
            </div>
		
				


		</div>
	
	</div>



</div>

<!-- Recent Jobs -->
    <div class="container">

            <div class="eleven columns">
                <div class="padding-right">
                    <h3 class="margin-bottom-25"><strong>Jobs Posted by this company</strong></h3>
                    <ul class="job-list">


                    @foreach ($company->jobs as $job)
                         <li class="highlighted">
                            <a href="{{route('jobs.show',$job->id)}}">
                                <img src="{{asset($job->company->logo)}}" alt="">
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
                </div>
            </div>
            </div>

@endsection