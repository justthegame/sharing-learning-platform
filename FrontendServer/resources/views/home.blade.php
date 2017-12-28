@extends('layouts.dashboard')


@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@section("article-section")
@foreach ($articles as $article)
@if($article)
<div class="tech-news-grid span_66">
    <div style="width:20%;float:left; margin-right:20px">
        <a href="{{ route('single',['id'=>$article['id']]) }}">
            @if (isset($article['pictures'][0]))
            <img style="max-width: 180px; object-fit: scale-down;" src="{{ config('app.articlesResource').$article['pictures'][0]['link']}}" alt="No Picture">
            @else
            <img style="max-width: 180px;" src="{{asset('../resources/lib/images/noimage.png')}}" alt="No Picture">
            @endif
        </a>
    </div>

    <div style="width:80%">
        <a href="{{ route('single',['id'=>$article['id']]) }}">{{$article['title']}}</a>
        <p>{{$article['content']}}</p>
        <p>by {{$article['user_name']}}</p>
    </div>
    <div class="clearfix"></div>	
</div>
@endif
@endforeach
@endsection

@section("conversation-section")
@foreach ($conversations as $conversation)
<div class="popular-grid">
    <i style="font-size:16pt">{{$conversation['chinese_text']}}</i>
    <p>{{$conversation['indonesian_text']}}</p>
</div>
@endforeach
@endsection

@section("register-form")
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <input type="submit" value="Register">
        </div>
    </div>
</form>
@endsection


@section("slider-content")
<div class="slider">
    <script src="{{asset('../resources/lib/js/responsiveslides.min.js')}}"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            $("#conference-slider").responsiveSlides({
                auto: true,
                manualControls: '#slider3-pager',
            });
            $("#slider3-pager a").click(function (e) {
                var articleID = e.currentTarget.id.split("_")[1];
                $("#sliderTitle").text($("#hidSlider_" + articleID).val());
            });
        });
    </script>
    <div class="conference-slider">
        <!-- Slideshow 3 -->
        <ul class="conference-rslide" id="conference-slider">
            @foreach($articlesSlider as $slider)
            <li>
                <a href="{{ route('single',['id'=>$slider['id']]) }}">
                    @if (isset($slider['pictures'][0]['link']))
                    <img style="height: 300px; object-fit: contain;" src="{{ config('app.articlesResource').$slider['pictures'][0]['link']}}" alt="">
                    @else
                    <img style="height: 300px;" src="{{asset('../resources/lib/images/noimage.png')}}" alt="">
                    @endif
                </a>
            </li>
            @endforeach
        </ul>
        <!-- Slideshow 3 Pager -->
        <ul id="slider3-pager">

            @foreach($articlesSlider as $slider)
            @if (isset($slider['pictures'][0]['link']))
            <li><a href="#" id="slider_{{$slider['id']}}"><img src="{{ config('app.articlesResource').$slider['pictures'][0]['link']}}" alt=""></a></li>
            @else
            <li><a href="#" id="slider_{{$slider['id']}}"><img src="{{asset('../resources/lib/images/noimage.png')}}" alt=""></a></li>
            @endif
            <input type="hidden" value="{{$slider['title']}}" id='hidSlider_{{$slider["id"]}}'>
            @endforeach
        </ul>
        <div class="breaking-news-title">
            <!--<p id='sliderTitle'>{{$articlesSlider[3]['title']}}</p>-->
            <h4><p>Breaking news</p></h4>
        </div>
    </div> 
    <!--<h5 class="breaking">Breaking news</h5>-->
</div>

@endsection

