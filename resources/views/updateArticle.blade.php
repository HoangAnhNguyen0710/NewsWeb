@extends('layouts.master')

@section('title')
    <title>Update article</title>
@endsection
@section('content')

<section class="section wb">
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="page-wrapper">
                {{-- <ol class="breadcrumb hidden-xs-down" style="text-align: left; font-size: 20px;">
                            <li class="breadcrumb-item">
                                {{$article['user']['name']}}
                            </li>
                            <li class="breadcrumb-item active">Sửa bài</li>
                        </ol> --}}
                <form id="post_a_status" class="needs-validation" onsubmit="sub_form(event)">
                    <div class="mb-3 mt-3">
                        <b><label for="title">Tiêu đề :</label></b>
                        <input type="text" placeholder="Nhập tiêu đề" name="title" id="title"
                            class="form-control mt-2 mb-3" required value="{{ $article['title'] }}">
                        <label for="category">Chủ đề :</label>
                        <div class="form-floating mb-3 mt-2">
                            <select class="form-select" id="category" name="category"
                                style="height: 38px; margin : 1px" value={{ $article['category_id'] }}
                                selected="selected" required>
                                <option disabled>Chọn chủ đề</option>
                                @foreach ($cat_list as $category)
                                    @if ($article['category_id'] == $category['id'])
                                        <option value="{{ $category['id'] }}" selected>{{ $category['category_name'] }}
                                        </option>
                                    @else
                                        <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <b><label for="content">Nội dung :</label></b>
                        <textarea class="form-control mb-3 mt-2" rows="5" id="ckeditor1" name="content" required>{{ $article['content'] }}</textarea>
                        <b><label for="display">Display :</label></b>
                        <select class="form-select" id="display" name="display" style="height: 38px; margin : 1px"
                            required>
                            @if ($article['display'] == 1)
                                <option value=1 selected>true</option>
                                <option value=0>false</option>
                            @else
                                <option value=1>true</option>
                                <option value=0 selected>false</option>
                            @endif
                        </select>
                        <br>
                        <b><label for="content">Thứ tự hiển thị :</label></b>
                        <input type="number" name="display_num" id="display_num"
                        class="form-control mt-2 mb-3 col-1" required value="{{ $article['display_num'] }}" min="1">
                    </div>
                    <button type="submit" id="submit-btn" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
     ClassicEditor
        .create( document.querySelector( '#ckeditor1' ) )
        .then( newEditor => {
        editor = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );

    function sub_form(event) {
        event.preventDefault();
        axios.post('/api/article', {
            id: {{$article['id']}},
            title: $('#title').val(),
            content: editor.getData(),
            category_id: $('#category').val(),
            display: $('#display').val(),
            display_num: $('#display_num').val(),
        }).then(function(res) {
            $('#submit-btn').attr('disabled', true);
            if (confirm("Update bài viết thành công!")) {
                $('#submit-btn').attr('disabled', false);
                document.location = '/admin';
            }
        }).catch(function(e) {
            console.log(e)
        })
    }
</script>

@endsection
{{-- </div>
    </div> --}}
