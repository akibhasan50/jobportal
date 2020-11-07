@extends('fontend.master')

@section('content')
    <div id="titlebar" class="resume">
	<div class="container">
		<div class="ten columns">
			<div class="resume-titlebar">
			@if (!empty(Auth::user()->company->logo))
				<img src="{{asset(Auth::user()->company->logo)}}" alt="">
			@else
				<img src="{{asset('ui/fontend')}}/images/avatar-placeholder.png" alt="">
			@endif
				
				<div class="resumes-list-content">
					<h4>{{Auth::user()->name}} <span>{{Auth::user()->company->cname}}</span></h4>
					{{-- <span class="icons"><i class="fa fa-map-marker"></i> {{Auth::user()->profile->address}}</span>
					<span class="icons"><i class="fa fa-envelope"></i> {{Auth::user()->email}}</span>
					 --}}
					
					
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

		<h3 class="margin-bottom-15">Update Company information</h3>
	   <form method="post" action="{{route('company.update')}}"  enctype="multipart/form-data">
         @csrf
			<!-- Location -->
			<div class="form">
				<h5>Company Name</h5>
				<input class="search-field" type="text"  name="cname" value="{{Auth::user()->company->cname}}" />

				@error('cname')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>
			<div class="form">
				<h5>Company Slogun</h5>
				<input class="search-field" type="text"  name="slogun" value="{{Auth::user()->company->slogun}}" />

				@error('slogun')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>
			<div class="form">
				<h5>Address</h5>
				<input class="search-field" type="text"  name="address"  value="{{Auth::user()->company->address}}"/>

				@error('address')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>
			<div class="form">
				<h5>Phone</h5>
				<input class="search-field" type="text"  name="phone"  value="{{Auth::user()->company->phone}}"/>

				@error('phone')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>
			<div class="form">
				<h5>Website</h5>
				<input class="search-field" type="text"  name="website"  value="{{Auth::user()->company->website}}"/>

				@error('website')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>

		
			<div class="form">
				<h5>Upload Logo </h5>
				<label class="upload-btn">
				    <input type="file" name="logo" multiple />
					<input type="hidden" name="oldlogo" value="{{Auth::user()->company->logo}}">
				    <i class="fa fa-upload"></i> Browse
				</label>
				<span class="fake-input">No file selected</span>
			</div>
             @error('logo')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			<div class="form">
				<h5>Upload Cover Photo </h5>
				<label class="upload-btn">
				    <input type="file" name="cover_photo" multiple />
					<input type="hidden" name="oldcover" value="{{Auth::user()->company->cover_photo}}">
				    <i class="fa fa-upload"></i> Browse
				</label>
				<span class="fake-input">No file selected</span>
			</div>
                @error('cover_photo')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			
			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				<textarea class="WYSIWYG" name="description" cols="10" rows="2" id="summary" spellcheck="true">{{Auth::user()->company->description}}</textarea>
                @error('description')
					<strong style="color:red">{{$message}}</strong>
				@enderror
			</div>
		
			<div class="form">
				<input type="submit" class="button border fw margin-top-10" name="login" value="update" />
			</div>
</form>

	</div>
	</div>


	<!-- Widgets -->
	<div class="eight columns">

		<h3 class="margin-bottom-20">About Company</h3>

		<!-- Resume Table -->
		<dl class="resume-table">
			<p class="margin-reset">
				<strong>Company Name:</strong>{{Auth::user()->company->cname}}
			</p>
			<p class="margin-reset">
				<strong>Slogun:</strong>{{Auth::user()->company->slogun}}
			</p>
			<p class="margin-reset">
				<strong> Email:</strong>{{Auth::user()->email}}
			</p>
			<p class="margin-reset">
				<strong>Address:</strong>{{Auth::user()->company->address}}
			</p>
			
			<p class="margin-reset">
				<strong>Phone:</strong>{{Auth::user()->company->phone}}
			</p>
			<p class="margin-reset">
				<strong> Website:</strong><a href="{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a> 
			</p>
			<p class="margin-reset">
				<strong>Description:</strong>{{Auth::user()->company->description}}
			</p>

		<br>

		</dl>

	</div>

</div>

@endsection