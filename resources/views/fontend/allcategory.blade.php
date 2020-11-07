@extends('fontend.master')


@section('content')

              <!-- Categories -->
              <div class="container">
                <div class="sixteen columns">
                    <h3 class="margin-bottom-25">All Categories</h3>
                    <ul id="popular-categories">
                    @foreach (App\Models\Category::all() as $category)
                    <li><a href="{{route('job.cat',$category->id)}}"><i class="ln  ln-icon-Bar-Chart"></i>{{$category->name}}</a></li>
                        
                    @endforeach
                
                    </ul>
    
                    <div class="clearfix"></div>
                    <div class="margin-top-30"></div>

                    <div class="margin-bottom-50"></div>
                </div>
            </div>
    
@endsection
  