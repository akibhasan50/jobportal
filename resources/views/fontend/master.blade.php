@include('fontend.partials.header')
     <!-- Content
        ================================================== -->
  

@yield('content');


        <!-- Footer
        ================================================== -->
        <div class="margin-top-15"></div>

        <div id="footer">
            <!-- Main -->
            <div class="container">

                <div class="seven columns">
                    <h4>About</h4>
                    <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
                    <a href="#" class="button">Get Started</a>
                </div>

                <div class="three columns">
                    <h4>Company</h4>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Our Blog</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Hiring Hub</a></li>
                    </ul>
                </div>

                <div class="three columns">
                    <h4>Press</h4>
                    <ul class="footer-links">
                        <li><a href="#">In the News</a></li>
                        <li><a href="#">Press Releases</a></li>
                        <li><a href="#">Awards</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Timeline</a></li>
                    </ul>
                </div>

                <div class="three columns">
                    <h4>Browse</h4>
                    <ul class="footer-links">
                        <li><a href="#">Freelancers by Category</a></li>
                        <li><a href="#">Freelancers in USA</a></li>
                        <li><a href="#">Freelancers in UK</a></li>
                        <li><a href="#">Freelancers in Canada</a></li>
                        <li><a href="#">Freelancers in Australia</a></li>
                        <li><a href="#">Find Jobs</a></li>

                    </ul>
                </div>

            </div>

            <!-- Bottom -->
            <div class="container">
                <div class="footer-bottom">
                    <div class="sixteen columns">
                        <h4>Follow Us</h4>
                        <ul class="social-icons">
                            <li><a class="facebook" href="https://www.facebook.com/capuchino.coffee.980"><i class="icon-facebook"></i></a></li>
                            <li><a class="twitter" href="https://www.facebook.com/capuchino.coffee.980"><i class="icon-twitter"></i></a></li>
                            <li><a class="gplus" href="https://www.facebook.com/capuchino.coffee.980"><i class="icon-gplus"></i></a></li>
                            <li><a class="linkedin" href="https://www.facebook.com/capuchino.coffee.980"><i class="icon-linkedin"></i></a></li>
                        </ul>
                        <div class="copyrights">©  Copyright 2020 by <a href="#">Akib hasan</a>. All Rights Reserved.</div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Back To Top Button -->
        <div id="backtotop"><a href="#"></a></div>

    </div>
     <!-- Scripts
    ================================================== -->
    <script src="{{asset('ui/fontend')}}/scripts/jquery-2.1.3.min.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/custom.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/jquery.superfish.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/jquery.themepunch.tools.min.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/jquery.themepunch.revolution.min.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/jquery.themepunch.showbizpro.min.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/jquery.flexslider-min.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/chosen.jquery.min.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/waypoints.min.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/jquery.counterup.min.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/jquery.jpanelmenu.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/stacktable.js"></script>
    <script src="{{asset('ui/fontend')}}/scripts/headroom.min.js"></script>

<!-- include summernote css/js -->


    
</body>
</html>
@include('sweetalert::alert')  