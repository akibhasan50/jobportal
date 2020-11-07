    <div id="banner" class="with-transparent-header parallax background" style="background-image: url({{asset('ui/fontend')}}/images/banner-home-02.jpg)" data-img-width="2000" data-img-height="1330" data-diff="300">
            <div class="container">
                <div class="sixteen columns">

                    <div class="search-container">

                       <form action="{{route('search')}}" method="post" >
                         @csrf
                        <h2>Find job</h2>
                        <input type="text" class="ico-01" placeholder="job title, keywords or company name" name="search1" />
                       
                        <button><i class="fa fa-search"></i></button>
                        	</form>
                        <!-- Browse Jobs -->
                        <div class="browse-jobs">
                            Browse job offers by <a href="browse-categories.html"> category</a> or <a href="#">location</a>
                        </div>

                        <!-- Announce -->
                        <div class="announce">
                            We’ve over <strong>15 000</strong> job offers for you!
                        </div>

                    </div>

                </div>
            </div>
        </div>

