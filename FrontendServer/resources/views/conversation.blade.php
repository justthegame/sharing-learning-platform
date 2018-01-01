@extends('layouts.all')

@section('main')

<!--<div class="col-md-8">-->
<div class="panel panel-default">
    <div class="panel-heading">My Conversation</div>
</div>
<div class="panel-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Indonesian Text</th>
                <th scope="col">Chinese Text</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Voice</th>
                <th scope="col">Action</th>
            </tr>
        <thead>
        <tbody>
            @if($conversations)
            @foreach($conversations as $conversation)
            <tr>
                <th scope="row">{{$conversation['id']}}</th>
                <td>{{$conversation['indonesian_text']}}</td>
                <td>{{$conversation['chinese_text']}}</td>
                <td>{{$conversation['category_id']}}</td>
                <td>{{$conversation['status']}}</td>
                <td>
                    <audio controls>
                        <source src="{{ config('app.conversationResource') . $conversation['voice_link'] }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </td>
                <td>
                    <button type="button" data-id="{{$conversation['id']}}" data-indonesian="{{$conversation['indonesian_text']}}"
                            data-category="{{$conversation['category_id']}}" data-chinese="{{$conversation['chinese_text']}}" 
                            data-status="{{$conversation['status']}}" onclick="editConversation(this)">
                        <span class="fa fa-edit"></span>
                    </button>
                    @if(Auth::user()->is_admin)
                    <button type="button" data-id="{{$conversation['id']}}" data-indonesian="{{$conversation['indonesian_text']}}"
                            data-category="{{$conversation['category_id']}}" data-chinese="{{$conversation['chinese_text']}}" 
                            data-status="Approved" onclick="editConversation(this)">
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
    <div class="panel-heading">New Conversation</div>

    <div class="panel-body content-form">
        <form method="POST" enctype="multipart/form-data" id="formConversationInsert" action="{{url('/conversation/insert')}}">
            {{ csrf_field() }}
            <input type="hidden" name="user" value="{{Auth::id()}}">
            <input type="hidden" name="id" id='conversation_id'>
            <input type="hidden" name="status" id='statuses'>
            <div class="form-group">
                <label for="">Indonesian Text</label>
                <input type="text" class="form-control" name='indonesian_text' id='txtIndonesianText'>
            </div>
            <div class="form-group">
                <label for="">Chinese Text</label>
                <input type="text" class="form-control" name='chinese_text' id='txtChineseText'>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name='category_id' id='txtCategory'>
                    @foreach($categories as $cat)
                    <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Voice</label>
                <div id='img-container'>
                    <input type='file' name='voice' class='img-multi form-control-file'>
                </div>
            </div>
            <button type='button' class="btn " id='btnSubmitForm'>submit</button>
        </form>
    </div>
</div>

@endsection
@section('js-content')
<script>
    var deleteImgUrl = "{{ config('app.ConversationServer') . 'picture/delete'}}";
    window.editConversation = function (element) {
        var id_art = $(element).data('id');
        var content_art = $(element).data('content');
        var cat_art = $(element).data('category');
        var indonesian_art = $(element).data('indonesian');
        var chinese_art = $(element).data('chinese');
        var status_art = $(element).data('status');

        $('#txtIndonesianText').val(indonesian_art);
        $('#txtChineseText').val(chinese_art);
        $('#txtCategory').val(cat_art);
        $('#txtContent').text(content_art);
        $('#conversation_id').val(id_art);
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
    };
    $(document).ready(function () {
//        var idFile = 0;
//        var urltoupload = "{{ config('app.conversationServer') . 'keyword/insert'}}";
//        var has_new_img = false;
//        $('#btnSubmitForm').on('click', function () {
//            if ($('#conversation_id').val() != '') {
//                urltoupload = "{{ config('app.conversationServer') . 'keyword/edit'}}";
//                if ($('.img-multi').val() != '')
//                    has_new_img = true;
//            }
//            $('#formConversationInsert').submit();
//        });
//        jQuery('#formConversationInsert').submit(function (e) {
//            e.preventDefault();
//            var fd = new FormData(jQuery(this)[0]);
//            jQuery.ajax({
//                url: urltoupload,
//                type: 'POST',
//                contentType: false,
//                data: fd,
//                processData: false,
//                success: function (data) {
//                    location.reload();
//                }
//            });
//        });
    });
</script>
@endsection
