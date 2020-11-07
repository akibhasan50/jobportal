<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Work Scout</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{mix('ui/fontend/css/style.css')}}">
    <link rel="stylesheet" href="{{mix('ui/fontend/css/green.css')}}">
    <script src="{{ mix('js/app.js') }}"></script>
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- Header
        ================================================== -->
        <header class=" sticky-header full-width">
            <div class="container">
                <div class="sixteen columns">

                    <!-- Logo -->
                    <div id="logo">
                        <h1><a href="{{url('/')}}"><img src="{{asset('ui/fontend')}}/images/logo.png" alt="Work Scout" /></a></h1>
                    </div>

                    <!-- Menu -->
                    <nav id="navigation" class="menu">
                        <ul id="responsive">

                            <li>
                                <a href="{{url('/')}}" >Home</a>
                               
                            </li>
                        @auth
                               @if (Auth::user()->user_type == 'employer')
                                         <li>
                                            <a href="{{route('job.create')}}">Post Job</a>
                                           
                                        </li>
                                         <li>
                                            <a href="{{route('job.manage')}}">Manage Job</a>
                                           
                                        </li>
                                         <li>
                                            <a href="{{route('job.applicants')}}">Manage Applicants</a>
                                           
                                        </li>
                                    @else
                                         <li>
                                            <a href="{{route('profile.index')}}">Job By Category</a>
                                        </li>
                                         <li>
                                            <a href="{{route('job.saveJob')}}">saved jobs</a>
                                        </li>
                                    @endif
                        @endauth
                              

                            <li>
                                <a href="#">Contact</a>
                            
                            </li>
                            <li>
                                <a href="#">About</a>
                            
                            </li>

             

                           
                        </ul>

                        @auth
                         
                                <ul id="responsive" class="float-right">

                                    @if (Auth::user()->user_type == 'seeker')
                                         <li>
                                            <a href="{{route('profile.index')}}">{{Auth::user()->name}}</a>
                                            <ul>
                                                <li><a href="{{route('auth.logout')}}">Logout</a></li>
                                                
                                            </ul>
                                        </li>
                                    @else
                                         <li>
                                            <a href="{{route('company.profile')}}">{{Auth::user()->company->cname}}</a>
                                            <ul>
                                                <li><a href="{{route('employer.logout')}}">Logout</a></li>
                                                
                                            </ul>
                                        </li>
                                    @endif
                                       
                                </ul> 
                           
                        @endauth
                        
                        @guest
                        <ul class="float-right">
                            <li><a href="{{url('/login-employer')}}"><i class="fa fa-user"></i>Join as Employer </a></li>
                            <li><a href="{{url('/login-reg')}}"><i class="fa fa-user"></i>Join as Candidate</a></li>
                        </ul> 
                        @endguest
                    </nav>

                    <!-- Navigation -->
                    <div id="mobile-navigation">
                        <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
                    </div>

                </div>
            </div>
        </header>
        <div class="clearfix"></div>

