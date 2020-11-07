@extends('fontend.master')

@section('content')
   <!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> Update Job</h2>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page">
    <form method="post" action="{{route('job.update',$job->id)}}" >
         @csrf
			<!-- Title -->
			<div class="form">
				<h5>Job Title</h5>
				<input class="search-field" type="text" name="title"   value="{{$job->title}}"/>
			</div>
			<!-- Title -->
			<div class="form"> 
				<h5>Job Role</h5>
				<input class="search-field" type="text" name="roles"  value="{{$job->roles}}"/>
			</div>
			<div class="form"> 
				<h5>Position</h5>
				<input class="search-field" type="text" name="position"   value="{{$job->position}}"/>
			</div>

			<!-- Location -->
			<div class="form">
				<h5>Address</span></h5>
				<input class="search-field" type="text"  name="address" value="{{$job->address}}"/>
				
			</div>
			<div class="form">
				<h5>Apply Deadline</span></h5>
				<input class="search-field" type="date" name="last_date"   value="{{$job->last_date}}"/>
				
			</div>

			<!-- Job Type -->
			<div class="form">
				<h5>Job Type</h5>
				<select data-placeholder="Full-Time"  name="type" class="chosen-select-no-single">
					<option  @if ($job->type == 'Full-Time' ) selected @endif value="Full-Time">Full-Time</option>
					<option  @if ($job->type == 'Part-Time' ) selected @endif value="Part-Time">Part-Time</option>
					<option  @if ($job->type == 'Internship' ) selected @endif value="Internship">Internship</option>
	
				</select>
			</div>
			<div class="form">
				<h5>Status</h5>
				<select data-placeholder="Active"  name="status" class="chosen-select-no-single">
					<option  @if ($job->status == '1' ) selected @endif  value="1">Active</option>
					<option  @if ($job->status == '0' ) selected @endif value="0">Inactive</option>
			
	
				</select>
			</div>


			<!-- Choose Category -->
			<div class="form">
				<div class="select">
					<h5>Category</h5>
					<select  name="category"  class="chosen-select">
                    <option>Choose Categories</option>
                    @foreach (App\Models\Category::all() as $item)
                        	<option @if ($job->category_id == $item->id ) selected @endif value="{{$item->id}}">{{$item->name}}</option>
					
                    @endforeach
					
					</select>
				</div>
			</div>


			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				<textarea  name="description" cols="40" rows="3" id="summary" spellcheck="true">{{$job->description}}</textarea>
			</div>

		
			<div class="form">
				<input type="submit" class="button border fw margin-top-10" name="submit" value="Update" />
			</div>
    </form>
		</div>
	</div>

</div>
 
@endsection