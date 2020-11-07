@extends('fontend.master')

@section('content')
    <!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Manage Applications</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>Job Dashboard</li>
				</ul>
			</nav>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">


	<!-- Applications -->
	<div class="sixteen columns">
		@foreach ($applicants as $applicant)
            <!-- Application #1 -->

            @foreach ($applicant->users as $user)
                <div class="application">
			<div class="app-content">
				
				<!-- Name / Avatar -->
				<div class="info">
                	@if (!empty(asset($user->profile->avater)))
				       	<img src="{{asset($user->profile->avater)}}" alt="">
                    @else
                        <img src="{{asset('ui/fontend')}}/images/avatar-placeholder.png" alt="">
                    @endif
				
					<span>{{$user->name}}</span> </br>
					<small><strong>Job Title:</strong> {{$applicant->title}}</small>
					<ul>
                    	@if (!empty($user->profile->resume))
                            <li><a href="{{url($user->profile->resume)}}"><i class="fa fa-file-text"></i> Download CV</a></li>
                            @else
                                <p>No Resume included</p>
                            @endif
						
						
					</ul>
				</div>
				
				<!-- Buttons -->
				<div class="buttons">
		
					<a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show Details</a>
				</div>
				<div class="clearfix"></div>

			</div>

			<!--  Hidden Tabs -->
			<div class="app-tabs">

				<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>

			    <!-- Third Tab -->
			    <div class="app-tab-content"  id="three-1">
					<i>Full Name:</i>
					<span>{{$user->name}}</span>

					<i>Email:</i>
					<span>{{$user->email}}</span>
					<i>Phone:</i>
					<span>{{$user->profile->phone}}</span>
					<i>Gender:</i>
					<span>{{$user->profile->gender}}</span>

					<i>	Address:</i>
					<span>{{$user->profile->address}}</span>

					<i>	Cover:</i>
					<span>{{$user->profile->cover_leter}}</span>
			    </div>

			</div>

		
		</div>
            @endforeach
		

        @endforeach
		



	</div>
</div>


@endsection