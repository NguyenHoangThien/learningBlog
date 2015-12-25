<div class="col-sm-4">
    <div class="right-sidebar">
        <div class="widget">
            <img class="about-photo" src="/user/img/photo.png" style="width:150px;height:150px" alt="">
            <h2 class="widget-title">ABOUT ME</h2>
            <p>Welcome to My Blog<br/>
            My name Thien - Web Developer .</p>
            <p class="social-profiles">Join me: <a href="http://facebook.com/tinypro" target="_blank"><i class="fa fa-facebook"></i></a> <a href="http://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a> <a href="http://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a> <a href="http://pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a></p>     
        </div>
        
        <div class="widget">
            <h2 class="widget-title">Categories</h2>
            <ul>
                @foreach ($qGetCategories as $category)
                    @if($category['cParentID'] == 1 )
                        <li>
                            <a href="/search/category/{{$category['cName']}}"> 
                                {!!$category['cName']!!} 
                            </a>
                        </li>
                        @foreach ($qGetCategories as $categorySub)
                            @if($categorySub['cParentID'] == $category['cID'])
                                <li>
                                    <i class="fa fa-caret-right"></i> 
                                    <a href="/search/category/{{$categorySub['cName']}}"> 
                                        {!!$categorySub['cName']!!} 
                                    </a>
                                </li>
                            @endif
                        @endforeach  
                    @endif
                @endforeach
            </ul>
        </div>
        
        <div class="widget">
            <h2 class="widget-title">Recent Posts</h2>
            <div class="single-wid-post">
                <a href="single-post.html">
                    <img src="/user/img/post-thumb.jpg" alt="" class="alignleft">
                    <h2>The story of a colorful life</h2>
                </a>
                <p><i class="fa fa-clock-o"></i> 15 Oct, 2015</p>
            </div>
            <div class="single-wid-post">
                <a href="single-post.html">
                    <img src="/user/img/post-thumb-2.jpg" alt="" class="alignleft">
                    <h2>Into the Backpack of a Photographer</h2>
                </a>
                <p><i class="fa fa-clock-o"></i> 21 Sep, 2015</p>
            </div>
            <div class="single-wid-post">
                <a href="single-post.html">
                    <img src="/user/img/post-thumb-3.jpg" alt="" class="alignleft">
                    <h2>The Light of Future</h2>
                </a>
                <p><i class="fa fa-clock-o"></i> 19 Sep, 2015</p>
            </div>
            <div class="single-wid-post">
                <a href="single-post.html">
                    <img src="/user/img/post-thumb-4.jpg" alt="" class="alignleft">
                    <h2>Some Speed Art Works, Will Amaze You</h2>
                </a>
                <p><i class="fa fa-clock-o"></i> 6 Jun, 2015</p>
            </div>
            <div class="single-wid-post">
                <a href="single-post.html">
                    <img src="/user/img/post-thumb-5.jpg" alt="" class="alignleft">
                    <h2>Meaning of Freedom!</h2>
                </a>
                <p><i class="fa fa-clock-o"></i> 29 may, 2015</p>
            </div>
        </div>
        
        <div class="widget">
            <h2 class="widget-title">Tags</h2>
            <div class="tag-cloud">
                @foreach ($qGetTags as $tag) 
                    <a href="/search/tag/{{$tag['tName']}}">{!!$tag['tName']!!}</a>
                @endforeach
            </div>
        </div>

        
    </div>
</div>