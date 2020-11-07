@extends('fontend.master')

@section('content')
    <div id="titlebar" class="resume">
	<div class="container">
		<div class="ten columns">
			<div class="resume-titlebar">
			@if (!empty(Auth::user()->profile->avater))
				<img src="{{asset(Auth::user()->profile->avater)}}" alt="">
			@else
				<img src="{{asset('ui/fontend')}}/images/avatar-placeholder.png" alt="">
			@endif
				
				<div class="resumes-list-content">
					<h4>{{Auth::user()->name}} <span>{{Auth::user()->profile->professional_title}}</span></h4>
					<span class="icons"><i class="fa fa-map-marker"></i> {{Auth::user()->profile->address}}</span>
					<span class="icons"><i class="fa fa-envelope"></i> {{Auth::user()->email}}</span>
					
					
					
					<div class="clearfix"></div>

				</div>
			</div>
		</div>

		<div class="six columns">
			<div class="two-buttons">

				<a href="#small-dialog" class="popup-with-zoom-anim button"><i class="fa fa-envelope"></i> Send Message</a>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Send Message to John Doe</h2>
					</div>

					<div class="small-dialog-content">
						<form action="#" method="get" >
							<input type="text" placeholder="Full Name" value=""/>
							<input type="text" placeholder="Email Address" value=""/>
							<textarea placeholder="Message"></textarea>

							<button class="send">Send Application</button>
						</form>
					</div>
					
				</div>
			


			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eight columns">
	<div class="padding-right">

		<h3 class="margin-bottom-15">Update information</h3>
	   <form method="post" action="{{route('profile.update')}}"  enctype="multipart/form-data">
         @csrf
			<!-- Location -->
			<div class="form">
				<h5>Professional title</h5>
				<input class="search-field" type="text"  name="professional_title"  value="{{Auth::user()->profile->professional_title}}"/>

				@error('professional_title')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>
			<div class="form">
				<h5>Address</h5>
				<input class="search-field" type="text"  name="address"  value="{{Auth::user()->profile->address}}"/>

				@error('address')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>
			<div class="form">
				<h5>Phone</h5>
				<input class="search-field" type="text"  name="phone"  value="{{Auth::user()->profile->phone}}"/>

				@error('phone')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>
			<div class="form">
				<h5>Experience</h5>
				<input class="search-field" type="text"  name="experience"  value="{{Auth::user()->profile->experience}}"/>

				@error('experience')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>

			<!-- Logo -->
			<div class="form">
				<h5>Upload Resume </h5>
				<label class="upload-btn">
				    <input type="file" name="resume" multiple />
					 <input type="hidden" name="oldimg" value="{{Auth::user()->profile->resume}}">
				    <i class="fa fa-upload"></i> Browse
				</label>
				<span class="fake-input">No file selected</span>

			</div>
			@error('resume')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			<div class="form">
				<h5>Upload Avatar </h5>
				<label class="upload-btn">
				    <input type="file" name="avater" multiple />
					<input type="hidden" name="oldavater" value="{{Auth::user()->profile->avater}}">
				    <i class="fa fa-upload"></i> Browse
				</label>
				<span class="fake-input">No file selected</span>
			</div>

			
			<!-- Description -->
			<div class="form">
				<h5>Cover letter</h5>
				<textarea  name="cover_leter" cols="10" id="summernote">{{Auth::user()->profile->cover_leter}}</textarea>
			</div>
			<div class="form">
				<h5>BioData</h5>
				<textarea class="WYSIWYG" name="bio" cols="10" rows="2" id="summary" spellcheck="true">{{Auth::user()->profile->bio}}</textarea>
			</div>
			<div class="form">
				<input type="submit" class="button border fw margin-top-10" name="login" value="update" />
			</div>
</form>

	</div>
	</div>


	<!-- Widgets -->
	<div class="eight columns">

		<h3 class="margin-bottom-20">About Me</h3>

		<!-- Resume Table -->
		<dl class="resume-table">
			<p class="margin-reset">
				<strong> Name:</strong>{{Auth::user()->name}}
			</p>
			<p class="margin-reset">
				<strong> Email:</strong>{{Auth::user()->email}}
			</p>
			<p class="margin-reset">
				<strong>Address:</strong>{{Auth::user()->profile->address}}
			</p>
			<p class="margin-reset">
			<strong>Resume:</strong>
			@if (!empty(Auth::user()->profile->resume))
				<a href="{{url(Auth::user()->profile->resume)}}"><i class="fa fa-download"></i>Download Resume</a>
			@else
				<p>Please upload your Resume</p>
			@endif
		
			</p>
			<p class="margin-reset">
				<strong>Phone:</strong>{{Auth::user()->profile->phone}}
			</p>
			<p class="margin-reset">
				<strong> BioData:</strong>{{Auth::user()->profile->bio}}
			</p>
			<p class="margin-reset">
				<strong> Cover letter:</strong>{{Auth::user()->profile->cover_leter}}
			</p>

		<br>

		</dl>

	</div>

</div>

@endsection