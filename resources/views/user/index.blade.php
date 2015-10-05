@extends('user.layout')
@section('content')
    <div class="col-sm-8">
        @foreach ($qGetArticles as $article) 
            <article class="post">
                <div class="post-content">
                    <p class="post-categories"><a href="/search/category/{{$article['cName']}}">
                     Category : {{$article['cName']}}</a></p>
                        <h2>
                            <a style="color:#f4645f" href="/show-post/{{$article['aID']}}">{{$article['aTitle']}}</a>
                        </h2>
                        <p class="posted-by">by <a href="#">{{$article['uUsername']}}</a> 
                        <i class="fa fa-clock-o"></i>
                        {{ date('d-M-Y',strtotime($article['aCreatedDate'])) }}
                        <i class="fa fa-heart"></i> 21 
                        <i class="fa fa-comments"></i> 6
                    </p>
                    <div class="post-excerpt">
                        {{$article['aDescription']}}
                    </div>
                    <div class="post-content-bottom">
                        <p class="post-share">
                            Share: <a href="#"><i class="fa fa-facebook"></i></a> 
                                   <a href="#"><i class="fa fa-twitter"></i></a> 
                                   <a href="#"><i class="fa fa-google-plus"></i></a> 
                                   <a href="#"><i class="fa fa-pinterest"></i></a></p>
                        <a href="/show-post/{{$article['aID']}}" class="readmore">
                            Read More 
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
        
        <div class="post-navigation">
            <nav>
                <ul class="pagination">
        <?php 
            $pageLimit = ceil($total/$offset) - $page - 5 > 0 ? $page + 5 : ceil($total/$offset);

            $from = ($page - 2 > 0) ? $page - 2 : 1;
            $to = ($page + 2 < $pageLimit) ? $page + 2 : $pageLimit; 

        ?>
                    @if($total >= $page * $offset )
                        @if( $page - 1 > 0)
                            <li>
                                <a href="?page={{$page-1}}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif
                        @for($i = $from ; $i <= $to; $i++)
                            <li><a 
                            <?php 
                                if($i == $page){
                                    echo "style='background-color:#39CA74;'";
                                }
                            ?>
                            href="?page={{$i}}">{{$i}}</a></li>
                        @endfor
                        @if( $page + 1 <= ceil($total/$offset) )
                            <li>
                                <a href="?page={{$page+1}}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @endif
                    @endif
                </ul>
            </nav>                        
        </div>
    </div>

    {{-- right column start --}}
    <?= view('user.common.rightSideBar',compact('qGetCategories','qGetTags')); ?>
    {{-- right column end --}}
@stop