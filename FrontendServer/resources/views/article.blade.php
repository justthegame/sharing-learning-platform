@extends('layouts.all')

@section('main')

<!--<div class="col-md-8">-->
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
                <th scope="col">Status</th>
                <th scope="col">Images</th>
                <th scope="col">Action</th>
            </tr>
        <thead>
        <tbody>
            @if (count($articles)> 0)
            @foreach($articles as $article)
            <tr>
                <th scope="row">{{$article['id']}}</th>
                <td>{{$article['title']}}</td>
                <td>{{$article['categories']['name']}}</td>
                <td>{{$article['content']}}</td>
                <td>{{$article['status']}}</td>
                <td>
                @foreach($article['pictures'] as $img)
                    <!--<button type="button" data-id="{{$img['id']}}" onclick="deleteImage(this)"><i class="fa fa-trash-o"></i></button>-->
                    <form method="post" action="{{url('/article/deletePicture')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$img['id']}}">
                        <img src="{{ config('app.articlesResource').$img['link']}}" width='50' height="50">
                        <button type="submit" onclick="return confirm('Do you want to delete this image?')"><i class="fa fa-trash-o"></i></button>
                    </form>
                @endforeach
                </td>
                <td>
                    <button type="button" data-id="{{$article['id']}}" data-title="{{$article['title']}}"
                            data-category="{{$article['category_id']}}" data-content="{{$article['content']}}" 
                            data-status="{{$article['status']}}" onclick="editArticle(this)">
                        <span class="fa fa-edit"></span>
                    </button>
                    <form method="post" action="{{url('/article/delete')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$article['id']}}">
                        <button type="submit" onclick="return confirm('Do you want to delete this article?')"><span class="fa fa-trash-o"></span></button>
                    </form>
                    @if(Auth::user()->is_admin)
                    <button type="button" data-id="{{$article['id']}}" data-title="{{$article['title']}}"
                            data-category="{{$article['category_id']}}" data-content="{{$article['content']}}" 
                            data-status="Approved" onclick="editArticle(this)">
                        <span class="fa fa-check"></span>
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<!--</div>-->

<div class="panel panel-default">
    <div class="panel-heading">New Article</div>

    <div class="panel-body content-form">
        <form method="POST" enctype="multipart/form-data" action="{{url('/article/insert')}}" id="formArticleInsert">
            {{ csrf_field() }}
            <input type="hidden" name="user" value="{{Auth::id()}}">
            <input type="hidden" name="id" id='article_id'>
            <input type="hidden" name="status" id='statuses'>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name='title' id='txtTitle'>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name='category_id' id='txtCategory'>
                    @if (count($categories)> 0)
                    @foreach($categories as $cat)
                    <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                    @endforeach
                    @endif
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
                <button type="button" class="btn " id='btnAdd'><span class="glyphicon glyphicon-plus">add image</span></button>
            </div>
            <button type='button' class="btn " id='btnSubmitForm'>submit</button>
        </form>
    </div>
</div>

@endsection
@section('js-content')
<script>
    var deleteImgUrl = "{{ config('app.articlesServer') . 'picture/delete'}}";
    window.editArticle = function (element) {
        var id_art = $(element).data('id');
        var content_art = $(element).data('content');
        var cat_art = $(element).data('category');
        var title_art = $(element).data('title');
        var status_art = $(element).data('status');

        $('#txtTitle').val(title_art);
        $('#txtCategory').val(cat_art);
        $('#txtContent').text(content_art);
        $('#article_id').val(id_art);
        $('#statuses').val(status_art);
    };

    window.deleteImage = function (element) {
        notin = $(element).data('id');
        if (confirm("Do you want to delete this image ?") == true) {
            $.post(deleteImgUrl, {id: notin}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    }
    $(document).ready(function () {
        var idFile = 0;
        $('#btnAdd').on('click', function () {
            idFile++;
            var html = "<input type='file' name='images[]' class='img-multi' id='id_" + idFile + "' style='margin-top: 4px;float:left'><button type='button' class='btn btnDel' id='del_" + idFile + "' style='margin-top: 4px;'>X</button><div style='clear:both'></div>";
            $('#img-container').append(html);
            $('.btnDel').on('click', function (event) {
                var targetId = event.target.id;
                var id = targetId.split('_')[1];
                $('#id_' + id).remove();
                $('#del_' + id).remove();
            });
        });
        var urltoupload = "{{ config('app.articlesServer') . 'article/insert'}}";
        var urluploadimg = "{{ config('app.articlesServer') . 'picture/insert'}}";
        var has_new_img = false;
        $('#btnSubmitForm').on('click', function () {
            if ($('#article_id').val() != '') {
                urltoupload = "{{ config('app.articlesServer') . 'article/edit'}}";
                if ($('.img-multi').val() != '')
                    has_new_img = true;
            }
            $('#formArticleInsert').submit();
        });
        // jQuery('#formArticleInsert').submit(function (e) {
        //     e.preventDefault();
        //     var fd = new FormData(jQuery(this)[0]);
        //     jQuery.ajax({
        //         url: urltoupload,
        //         type: 'POST',
        //         contentType: false,
        //         data: fd,
        //         processData: false,
        //         success: function (data) {
        //             if (has_new_img)
        //                 jQuery.ajax({
        //                     url: urluploadimg,
        //                     type: 'POST',
        //                     contentType: false,
        //                     data: fd,
        //                     processData: false,
        //                     success: function (data) {
        //                         location.reload();
        //                         console.log(data);
        //                     }
        //                 });
        //             location.reload();
        //         }
        //     });
        // });
    });
</script>
@endsection
