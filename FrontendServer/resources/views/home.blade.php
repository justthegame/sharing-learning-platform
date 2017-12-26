@extends('layouts.dashboard')

    
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
                    @section("article-section")
                        @foreach ($articles as $article)
                        <div class="tech-news-grid span_66">
                            <a href="single.html">
                                <div style="width:20%;float:left; margin-right:20px"><img src="https://p.w3layouts.com/demos/konstructs/web/images/a1.jpg" alt="Iki Gambar Utama" style="max-width:100%;max-height:100%">
                                </div>
                                <div style="width:80%">
                                    <a href="{{ route('home') }}">{{$article['title']}}</a>
                                    <p>{{$article['content']}}</p>
                                    <p>by<a href="#">John Doe </a>  |  29 comments</p>
                                </div>
                            </a>
                            <div class="clearfix"></div>	
                        </div>
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
                    
                    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Article</div>

                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" name='title'>
                        <input type="text" name='category'>
                        <textarea name='content'></textarea>
                        <div id='img-container'>
                            <input type='file' name='images[]' class='img-multi'>
                        </div>
                        <button type="button" id='btnAdd'>Add Image</button>
                        <input type='submit'>
                    </form>
                </div>
            </div>
        </div>
    </div>



@section('js-content')
<script>
    $(document).ready(function () {
        var idFile = 0;
        $('#btnAdd').on('click', function () {
            idFile++;
            var html = "<input type='file' name='image[]' class='img-multi' id='id_" + idFile + "'><button type='button' class='btnDel' id='del_" + idFile + "'>delete</button>";
            $('#img-container').append(html);

            $('.btnDel').on('click', function (event) {
                var targetId = event.target.id;
                var id = targetId.split('_')[1];
                $('#id_' + id).remove();
                $('#del_' + id).remove();
            });
        });
    });
</script>
@endsection
