@extends('fontend.master')

@section('content')
       <!-- Titlebar
        ================================================== -->
        <div id="titlebar" class="single">
            <div class="container">

                <div class="sixteen columns">
                    <h2>Employer Account</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li>You are here:</li>
                            <li><a href="#">Home</a></li>
                            <li>Employer Account</li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>


        <!-- Content
        ================================================== -->
        <!-- Container -->
        <div class="container">

            <div class="my-account">

                <ul class="tabs-nav">
                    <li class=""><a href="#tab1">Login</a></li>
                    <li><a href="#tab2">Register</a></li>
                </ul>

                <div class="tabs-container">
                    <!-- Login -->
                    <div class="tab-content" id="tab1" style="display: none;">
                        <form method="post" class="login" action="{{route('employer.login')}}">
                                @csrf
                            <p class="form-row form-row-wide">
                                <label for="email">
                                    Email:
                                     <i class="ln ln-icon-Mail"></i>
                                    <input type="text" class="input-text" name="email" id="email" value="" />
                                </label>

                                @error('email')
                                     <strong style="color:red">{{$message}}</strong>
                                @enderror
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password">
                                    Password:
                                    <i class="ln ln-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password" id="password" />
                                </label>
                                @error('password')
                                     <strong style="color:red">{{$message}}</strong>
                                @enderror
                            </p>

                            <p class="form-row">
                                <input type="submit" class="button border fw margin-top-10" name="login" value="Login" />

                                <label for="rememberme" class="rememberme">
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me
                                </label>
                            </p>

                            <p class="lost_password">
                                <a href="#">Lost Your Password?</a>
                            </p>

                        </form>
                    </div>

                    <!-- Register -->
                    <div class="tab-content" id="tab2" style="display: none;">

                        <form method="post" class="register" action="{{route('employer.registration')}}">
                                @csrf
                            <p class="form-row form-row-wide">
                                <label for="username2">
                                   Company Name:
                                    <i class="ln ln-icon-Male"></i>
                                    <input type="text" class="input-text" name="cname" id="username2" value="{{old('cname')}}" />
                                </label>
                                @error('cname')
                                     <strong style="color:red">{{$message}}</strong>
                                @enderror
                            </p>
                          
                            <p class="form-row form-row-wide">
                                <label for="email2">
                                    Email Address:
                                    <i class="ln ln-icon-Mail"></i>
                                    <input type="text" class="input-text" name="email" id="email2" value="{{old('email')}}" />
                                </label>

                                 @error('email')
                                     <strong style="color:red">{{$message}}</strong>
                                @enderror
                            </p>
                           
                            <p class="form-row form-row-wide">
                                <label for="password1">
                                    Password:
                                    <i class="ln ln-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password" id="password1" />
                                </label>

                            @error('password')
                                     <strong style="color:red">{{$message}}</strong>
                                @enderror
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password2">
                                    Repeat Password:
                                    <i class="ln ln-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="confirm_password" id="password2" />
                                </label>

                                    @error('confirm_password')
                                     <strong style="color:red">{{$message}}</strong>
                                @enderror
                            </p>

                            <p class="form-row">
                                <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection