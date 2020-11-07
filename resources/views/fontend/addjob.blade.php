@extends('fontend.master')

@section('content')
   <!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> Add Job</h2>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page">
    <form method="post" action="{{route('job.store')}}" >
         @csrf
			<!-- Title -->
			<div class="form">
				<h5>Job Title</h5>
				<input class="search-field" type="text" name="title"  placeholder="" value=""/>
			</div>
			<!-- Title -->
			<div class="form"> 
				<h5>Job Role</h5>
				<input class="search-field" type="text" name="roles"  placeholder="" value=""/>
			</div>
			<div class="form"> 
				<h5>Position</h5>
				<input class="search-field" type="text" name="position"  placeholder="" value=""/>
			</div>

			<!-- Location -->
			<div class="form">
				<h5>Address</span></h5>
				<input class="search-field" type="text"  name="address" placeholder="e.g. London" value=""/>
				
			</div>
			<div class="form">
				<h5>Apply Deadline</span></h5>
				<input class="search-field" type="date" name="last_date"   value=""/>
				
			</div>

			<!-- Job Type -->
			<div class="form">
				<h5>Job Type</h5>
				<select data-placeholder="Full-Time"  name="type" class="chosen-select-no-single">
					<option value="Full-Time">Full-Time</option>
					<option value="Part-Time">Part-Time</option>
					<option value="Internship">Internship</option>
	
				</select>
			</div>
			<div class="form">
				<h5>Status</h5>
				<select data-placeholder="Active"  name="status" class="chosen-select-no-single">
					<option value="1">Active</option>
					<option value="0">Inactive</option>
			
	
				</select>
			</div>


			<!-- Choose Category -->
			<div class="form">
				<div class="select">
					<h5>Category</h5>
					<select  name="category"  class="chosen-select">
                    <option>Choose Categories</option>
                    @foreach (App\Models\Category::all() as $item)
                        	<option value="{{$item->id}}">{{$item->name}}</option>
					
                    @endforeach
					
					</select>
				</div>
			</div>


			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				<textarea  name="description" cols="40" rows="3"  spellcheck="true"></textarea>
			</div>

		
			<div class="form">
				<input type="submit" class="button border fw margin-top-10" name="submit" value="Submit" />
			</div>
    </form>
		</div>
	</div>

</div>
 
@endsection