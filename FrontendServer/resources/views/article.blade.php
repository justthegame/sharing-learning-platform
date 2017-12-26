@extends('layouts.default')

@section('content')
<div class="container">
    <div class='row'>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Article</div>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Content</th>
                            <th scope="col">Images</th>
                        </tr>
                    <thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <th scope="row">{{$article['article']['id']}}</th>
                            <td>{{$article['article']['title']}}</td>
                            <td>{{$article['article']['category_id']}}</td>
                            <td>{{$article['article']['content']}}</td>
                            @foreach($article['images'] as $img)
                            <td><img src='http://140.118.109.62/sharing-learning-platform/ArticlesAPIServer/public/{{$img['link']}}'></td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name='title' id='txtTitle'>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name='category_id' id='txtCategory'>
                                @foreach($categories as $cat)
                                <option value='{{$cat['id']}}'>{{$cat['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea class="form-control" name='content' id='txtContent' rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Images</label>
                            <div id='img-container'>
                                <input type='file' name='images[]' class='img-multi form-control-file'>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id='btnAdd'><span class="glyphicon glyphicon-plus">add image</span></button>
                        </div>
                        <input type='submit' class="btn btn-primary" id='btnSubmitForm'>
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
            var html = "<input type='file' name='images[]' class='img-multi' id='id_" + idFile + "' style='margin-top: 4px;'><button type='button' class='btn btn-primary btnDel' id='del_" + idFile + "' style='margin-top: 4px;'>delete</button>";
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
