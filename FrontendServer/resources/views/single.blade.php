@extends('layouts.all')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@section("main")
<div class="blog-main-content">		
    <div class="col-md-9 total-news">

        <div class="grids">
            <div class="grid box">
                <div class="grid-header">
                    <a class="gotosingle" href="singlepage.html">{{ $article['title'] }}</a>
                    <ul>
                        <li><span>Post by<a href="#"> {{ $article['user_name'] }}</a> on {{''); $date = date_create($article['created_at']); echo date_format($date, 'l, F j, Y'}} </span></li>
                    </ul>
                </div>
                <div class="singlepage">
                    @if (isset($article['pictures'][0]))
                    @foreach ($article['pictures'] as $image)
                    <img src="{{ config('app.articlesResource').$image['link']}}" alt="No Picture" style="max-height: 300px; object-fit: scale-down;">
                    @endforeach
                    @else
                    <img src="{{asset('../resources/lib/images/noimage.png')}}" alt="No Picture">
                    @endif
                    <p>{{ $article['content'] }}</p>
                    <div class="clearfix"> </div>
                </div>
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

@section("conversation-section")
@endsection

