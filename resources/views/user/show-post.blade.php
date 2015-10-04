@extends('user.layout')


@section('content')
    <div class="col-sm-8">
        <article class="post">
            <header class="entry-header">
                <h2 class="entry-title">
                    <a rel="bookmark" href="single-post.html">
                        {{$qArticle['aTitle']}}
                    </a>
                </h2> <!-- //.entry-title -->
                <p class="posted-by">
                    by <a>{{$qArticle['uUsername']}}</a> 
                    <i class="fa fa-clock-o"></i> 
                    {{ date('d-M-Y',strtotime($qArticle['aCreatedDate'])) }}
                    <i class="fa fa-heart"></i> 21 
                    <i class="fa fa-comments"></i> 6
                </p>
            </header>

            <div class="entry-summary">
                {!! $qArticle['aContent'] !!}
            </div> 


        <div class="post-content-bottom">
            <p class="post-share">
                Share: 
                    <a href="#"><i class="fa fa-facebook"></i></a> 
                    <a href="#"><i class="fa fa-twitter"></i></a> 
                    <a href="#"><i class="fa fa-google-plus"></i></a> 
                    <a href="#"><i class="fa fa-pinterest"></i></a></p>
            <div class="post-tags-single">
                @foreach (explode(",", $qArticle['aTag']) as $tag)
                    <a href="/tag/{{$tag}}">{{$tag}}</a>
                @endforeach
            </div>
        </div>

        </article>   
    
        <div class="author-meta">
            <div class="row">
                <div class="col-xs-2">
                    <img src="/user/img/avater.jpg" alt="Farhan Rizvi">
                </div>
                
                <div class="col-xs-10">
                    <h2 class="author-name-headding">Farhan Rizvi - <span><a href="http://www.farhan-rizvi.com/">www.farhan-rizvi.com</a></span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    <p class="social-links">
                        <a href="http://facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a> 
                        <a href="http://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a> 
                        <a href="http://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a> 
                        <a href="http://pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </p>
                </div>
            </div>
        </div>
    
        <?= view('user.common.relatedPost'); ?>
                    
        <div id="comments" class="comments-area">
            <?= view('user.common.commentBox'); ?>
            <!-- #respond -->
        </div>                 
    </div>

    {{-- right column start --}}
        <?= view('user.common.rightSideBar',compact('qGetCategories','qGetTags')); ?>
    {{-- right column end --}}
@stop