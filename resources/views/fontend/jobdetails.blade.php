@extends('fontend.master')

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span><a href="browse-jobs.html">Home / Job Details</a></span>
			<h2>{{$job->title}} <span class="full-time">{{$job->type}}</span></h2>
			
		</div>

		<div class="six columns">
		
		@if (!$job->checkFavourite())

			<form action="{{route('job.favourite',$job->id)}}" method="POST">
				@csrf
			   <button type="submit" class="send"><i class="fa fa-star" aria-hidden="true"></i> save This  Job</button>
			   
		   </form>
	
		@else
		
		<form action="{{route('job.unfavourite',$job->id)}}" method="POST">
			@csrf
			<button type="submit" class="send" style="background:blue;"><i class="fa fa-star" aria-hidden="true"></i>  unsave This Job</button>
	   </form>
		
		
		@endif
			
		</div>
	

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Recent Jobs -->
	<div class="eleven columns">
			<div class="padding-right">
				
				<!-- Company Info -->
				<div class="company-info">
					<img src="{{asset($job->company->logo)}}" alt="">
					<div class="content">
						<h4>{{$job->company->cname}}</h4>
						<span><a href="#"><i class="fa fa-link"></i> {{$job->company->website}}</a></span>
						<span><a href="#"><i class="fa fa-mobile"></i> {{$job->company->phone}}</a></span>
						
					</div>
					<div class="clearfix"></div>
				</div>
						
				<p class="margin-reset">
						{{$job->description}}
				</p>

			</div>
			
	</div>


	<!-- Widgets -->
	<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			<h4>Overview</h4>

			<div class="job-overview">
				
				<ul>
					<li>
						<i class="fa fa-map-marker"></i>
						<div>
							<strong>Company:</strong>
							<a href="{{route('company.index',$job->company->id)}}"><span>{{$job->company->cname}}</span></a>
						</div>
					</li>
					<li>
						<i class="fa fa-map-marker"></i>
						<div>
							<strong>Location:</strong>
							<span>{{$job->company->address}}</span>
						</div>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Job Title:</strong>
							<span>{{$job->title}}</span>
						</div>
					</li>
					<li>
						<i class="fa fa-calendar" aria-hidden="true"></i>
					
						<div>
							<strong>Last date:</strong>
							<span>{{$job->last_date}}</span>
						</div>
					</li>
				
				</ul>
				@if (Auth::user()->user_type == 'seeker')

							@if (!$job->checkApplication())
							<form action="{{route('job.apply',$job->id)}}" method="POST">
							 @csrf
								<button type="submit" class="send">Apply</button>
								
							</form>
							@else
								<a href="#"><i class="fa fa-star" aria-hidden="true"></i><span>Appllied</span></a>
								
							@endif

				
                @endif

				

			</div>

		</div>

	</div>
	<!-- Widgets / End -->

		<div class="sixteen columns">
		<div class="application">
			<div class="info">
				
		
				<!-- Buttons -->
				<div class="buttons">
				
					<a href="#two-1" class="button  app-link"><i class="fa fa-envelope"></i>Refer your friends</a>
				
				</div>
				<div class="clearfix"></div>

			</div>

			<!--  Hidden Tabs -->
			<div class="app-tabs">

				<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>
				
		
			    
			    <!-- Second Tab -->
			    <div class="app-tab-content"  id="two-1">
					<h1>Send job to your friend</h1>
					<hr>
					<form  action="{{route('send.mail')}}" method="post">
					@csrf
						<div class="form-group">
						<label for="">Your Name</label>
						<input type="text" class="form-control" name="" id="" placeholder="">
						
						</div>
						<div class="form-group">
						<label for="">Your Email</label>
						<input type="email" class="form-control" name="" id="" placeholder="">
						
						</div>
						<div class="form-group">
						<label for="">Friend Name</label>
						<input type="text" class="form-control" name="" id="" placeholder="">
						
						</div>
						<div class="form-group">
						<label for="">Friend Email</label>
						<input type="email" class="form-control" name="" id="" placeholder="">
						
						</div>
						
						<button type="submit" class="btn btn-primary">send mail</button>
			
					</form>
				
			    </div>
		

			</div>

	
		</div>


		</div>		
</div>



@endsection