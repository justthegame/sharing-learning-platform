@extends('layouts.all')

@section("main")
<div class="blog-main-content">		
    <div class="col-md-9 total-news">
        <!----start-content----->
        <div class="content">
            <div class="grids">
                @foreach($articles as $article)
                <div class="grid box">
                    <div class="grid-header">
                        <a class="gotosingle" href="{{ route('single',['id'=>$article['id']]) }}">{{ $article['title'] }}</a>
                        <ul>
                            <li><span>Post by {{ $article['user_name'] }} on {{''); $date = date_create($article['created_at']); echo date_format($date, 'l, F j, Y'}}</span></li>
                        </ul>
                    </div>
                    <div class="grid-img-content">
                        <a href="{{ route('single',['id'=>$article['id']]) }}">
                            @if (isset($article['pictures'][0]))
                            <img style="max-width: 150px; object-fit: scale-down;" class="blog" src="http://140.118.109.62/sharing-learning-platform/ArticlesAPIServer/public/{{$article['pictures'][0]}}" alt="No Picture">
                            @else
                            <img style="max-width: 150px; object-fit: scale-down;" class="blog" src="{{asset('../resources/lib/images/noimage.png')}}" alt="No Picture">
                            @endif
                        </a>
                        <p>{{$article['content']}}</p>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="comments">
                        <ul>
                            <li><a class="readmore" href="{{ route('single',['id'=>$article['id']]) }}">ReadMore</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>

        </div>
    </div>	
    <div class="col-md-3 side-bar">
        <div class="l_g_r">
            <div class="posts">
                <h4>Recent posts</h4>
                <h6><a href="#">Aliquam tincidunt mauris</a></h6>
                <h6><a href="#">Vestibulum auctor lipsum</a></h6>
                <h6><a href="#">Nunc dignissim risus</a></h6>
                <h6><a href="#">Cras ornare tristiqu</a></h6>
            </div>
            <div class="recent-comments">
                <h4>Recent Comments</h4>
                <h6><a href="#">Amada Doe <span>on</span> Hello World!</a></h6>
                <h6><a href="#">Peter Doe <span>on</span> Photography</a></h6>
                <h6><a href="#">Steve Roberts <span>on</span> HTML5/CSS3</a></h6>
                <h6><a href="#">Doe Peter<span>on</span> Photography</a></h6>
            </div>
            <div class="archievs">
                <h4>Archives</h4>
                <h6><a href="#">October 2014</a></h6>
                <h6><a href="#">September 2014</a></h6>
                <h6><a href="#">August 2014</a></h6>
                <h6><a href="#">July 2014</a></h6>
            </div>
            <div class="categories">
                <h4>Categories</h4>
                <h6><a href="#">Vivamus vestibulum nulla</a></h6>
                <h6><a href="#">Integer vitae libero ac risus e</a></h6>
                <h6><a href="#">Vestibulum commo</a></h6>
                <h6><a href="#">Cras iaculis ultricies</a></h6>
            </div>						

        </div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection