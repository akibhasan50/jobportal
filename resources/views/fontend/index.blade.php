@extends('fontend.master')

@section('content')
        <!-- Banner
        ================================================== -->
 @include('fontend.partials.banner') 
   
          <!-- Categories -->
        <div class="container">
            <div class="sixteen columns">
                <h3 class="margin-bottom-25">Popular Categories</h3>
                <ul id="popular-categories">
                @foreach ($categories as $category)
                <li><a href="{{route('job.cat',$category->id)}}"><i class="ln  ln-icon-Bar-Chart"></i>{{$category->name}}</a></li>
                    
                @endforeach
            
                </ul>

                <div class="clearfix"></div>
                <div class="margin-top-30"></div>

            <a href="{{route('category.all')}}" class="button centered">Browse All Categories</a>
                <div class="margin-bottom-50"></div>
            </div>
        </div>


        <div class="container">

            <!-- Recent Jobs -->
            <div class="eleven columns">
                <div class="padding-right">
                    <h3 class="margin-bottom-25">Recent Jobs</h3>
                    <ul class="job-list">


                    @foreach ($jobs as $job)
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

                <a href="{{route('job.all')}}" class="button centered"><i class="fa fa-plus-circle"></i> Show All Jobs</a>
                    <div class="margin-bottom-55"></div>
                </div>
            </div>

            <!-- Job Spotlight -->
            <div class="five columns">
                <h3 class="margin-bottom-5">Job Spotlight</h3>

                <!-- Navigation -->
                <div class="showbiz-navigation">
                    <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
                    <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
                </div>
                <div class="clearfix"></div>

                <!-- Showbiz Container -->
                <div id="job-spotlight" class="showbiz-container">
                    <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1">
                        <div class="overflowholder">

                            <ul>
                                @foreach ($jobs as $job)
                                <li>
                                    <div class="job-spotlight">
                                        <h2>{{$job->title}}<h4> <span class="part-time">{{$job->type}}</span></h4></h2>
                                         <span><i class="fa fa-briefcase"></i> {{$job->company->cname}}</span>
                                        <span><i class="fa fa-map-marker"></i> {{$job->address}}</span>
                                        <span><i class="fa fa-calendar"></i>{{$job->created_at->diffForHumans()}} </span>
                                          <p>{{Str::limit($job->description, $limit = 100, $end = '...')}}</p>
                                          <a href="{{route('jobs.show',$job->id)}}" class="button">View This Job</a>
                                          
                                    </div>
                                </li>
                                @endforeach
             

                            </ul>
                            <div class="clearfix"></div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Testimonials -->
        <div id="testimonials">
            <!-- Slider -->
            <div class="container">
                <div class="sixteen columns">
                    <div class="testimonials-slider">
                        <ul class="slides">
                            <li>
                                <p>
                                    I have already heard back about the internship I applied through Job Finder, that's the fastest job reply I've ever gotten and it's so much better than waiting weeks to hear back.
                                    <span>Collis Ta’eed, Envato</span>
                                </p>
                            </li>

                            <li>
                                <p>
                                    Nam eu eleifend nulla. Duis consectetur sit amet risus sit amet venenatis. Pellentesque pulvinar ante a tincidunt placerat. Donec dapibus efficitur arcu, a rhoncus lectus egestas elementum.
                                    <span>John Doe</span>
                                </p>
                            </li>

                            <li>
                                <p>
                                    Maecenas congue sed massa et porttitor. Duis placerat commodo ex, ut faucibus est facilisis ac. Donec eleifend arcu sed sem posuere aliquet. Etiam lorem metus, suscipit vel tortor vitae.
                                    <span>Tom Smith</span>
                                </p>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- Infobox -->
        <div class="infobox">
            <div class="container">
                <div class="sixteen columns">Start Building Your Own Job Board Now <a href="my-account.html">Get Started</a></div>
            </div>
        </div>


@endsection