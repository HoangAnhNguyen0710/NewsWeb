@extends('layouts.master')

@section('title')
    <title>Admin</title>
@endsection

@section('content')
   <div class="container-fluid">
    <table class="table">
        <thead>
          <tr class="table-info">
            <th class="col-2">Thứ tự ưu tiên</th>
            <th class="col-5">Tên bài viết</th>
            <th class="col-2">Category</th>
            <th class="col-2">Tác giả</th>
            <th class="col-1">Display</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list as $article)
          <tr>
            <th scope="row">{{$article['display_num']}}</th>
            <td class=""><a href="/article/{{$article['id']}}">{{$article['title']}}</a></td>
            <td>{{$article['category']['category_name']}}</td>
            <td>{{$article['user']['name']}}</td>
            <td class="d-flex align-items-center"><span class="mx-3">{!!$article['display'] == 1 ? "<span class='bg-success p-3 text-white '>on</span>" :"<span class='bg-danger p-3 text-white '>off</span>"!!}</span><a href="update-article/{{$article['id']}}" class="btn btn-primary p-3">sửa</a></td>
          </tr> 
          @endforeach
        </tbody>
      </table>
      {{-- Pagination --}}
      <div class="d-flex justify-content-center py-4">
        {{ $list->appends(['items_per_page' => 5])->onEachSide(1)->links() }}
    </div>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script>
          function updateArticle(article) {
            if ($('#' + article).hasClass('d-none')) {
              $('#' + article).removeClass('d-none');
            }
            else $('#' + article).addClass('d-none');
          }
         
          
      </script>
   </div>
@endsection