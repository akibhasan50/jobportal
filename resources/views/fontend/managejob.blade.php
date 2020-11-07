@extends('fontend.master')

@section('content')
    <!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Manage Jobs</h2>
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
	
	<!-- Table -->
	<div class="sixteen columns">

		<table class="manage-table responsive-table">

			<tr>
				<th><i class="fa fa-file-text"></i> Title</th>
				<th><i class="fa fa-calendar"></i> Date Posted</th>
				<th><i class="fa fa-calendar"></i> Date Expires</th>
				<th><i class="fa fa-user"></i> Actions</th>
				<th></th>
			</tr>
					
		
					
			<!-- Item #2 -->
            @foreach ($jobs as $job)

			<tr>
            <td class="title"><a href="#">{{$job->title}}</a></td>
			
				<td>{{$job->created_at->format('d M Y')}}</td>
				<td>{{$job->last_date}}</td>
				
				<td class="action">
                <a href="{{route('job.edit',$job->id)}}"><i class="fa fa-pencil"></i> Edit</a>
					
					<a href="{{route('job.destroy',$job->id)}}" class="delete"><i class="fa fa-remove"></i> Delete</a>
				</td>
			</tr>	
                            
            @endforeach
			

		</table>

		<br>
		<a href="#" class="button">Add Job</a>

	</div>

</div>

@endsection