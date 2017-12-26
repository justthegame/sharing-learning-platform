@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">News</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="content-left">
                        @foreach ($articles as $article)
                        <div class="article">
                            <h6>Category</h6>
                            <a class="title" href="{{ route('home') }}">{{$article['title']}}</a>
                            <a href="single.html"><img src="https://p.w3layouts.com/demos/konstructs/web/images/a1.jpg" alt="Iki Gambar Utama"></a>
                            <p>{{$article['content']}}</p>
                        </div>
                        @endforeach
                    </div>

                    @foreach ($conversations as $conversation)
                    <div class="article">
                        <h6>Conversation</h6>
                        <p>{{$conversation['indonesian_text']}}</p>
                        <p>{{$conversation['chinese_text']}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Article</div>

                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data" id="formArticleInsert">
                        {{ csrf_field() }}
                        <input type="hidden" name="user" value="{{Auth::id()}}">
                        <input type="text" name='title' id='txtTitle'>
                        <input type="text" name='category_id' id='txtCategory'>
                        <textarea name='content' id='txtContent'></textarea>
                        <div id='img-container'>
                            <input type='file' name='images[]' class='img-multi'>
                        </div>
                        <button type="button" id='btnAdd'>Add Image</button>
                        <input type='submit' id='btnSubmitForm'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-content')
<script>
    $(document).ready(function () {
        var idFile = 0;
        $('#btnAdd').on('click', function () {
            idFile++;
            var html = "<input type='file' name='images[]' class='img-multi' id='id_" + idFile + "'><button type='button' class='btnDel' id='del_" + idFile + "'>delete</button>";
            $('#img-container').append(html);

            $('.btnDel').on('click', function (event) {
                var targetId = event.target.id;
                var id = targetId.split('_')[1];
                $('#id_' + id).remove();
                $('#del_' + id).remove();
            });
        });

        var urltoupload = "{{ config('app.articlesServer') . 'article/insert'}}";
        jQuery('#formArticleInsert').submit(function (e) {
            e.preventDefault();

            var fd = new FormData(jQuery(this)[0]);

            jQuery.ajax({
                url: urltoupload,
                type: 'POST',
                contentType: false,
                data: fd,
                processData: false,
                success: function (data) {
                    console.log(data);
                }
            });
        });



    });
</script>
@endsection
