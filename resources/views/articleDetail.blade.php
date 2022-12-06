@extends('layouts.master')

@section('title')
    <title>{{ $article['title'] }}</title>
@endsection
@section('content')
    <div class="container">
        <section class="section wb">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                    <div class="blog-title-area">
                        <span class="color-aqua" style="font-size: 16px"><a href="{{ $article['category_id'] }}"
                                title="">{{ $article['category']['category_name'] }}</a></span>
                        <h3 style="font-size: 1.7rem">{{ $article['title'] }}</h3>
                        <div class="post-author--wrapper">
                            <img class="post-author" src="{{ asset('images/gau-icon.png') }}" alt="">
                            <div class="post-author--infor">
                                <a class="post-author--name" href="#" style="color: #000000;">
                                    {{ $article['user']['name'] }}
                                </a>
                                <br><span class="post-author--posting-time">
                                    {{ Carbon\Carbon::parse($article['created_at'])->format('Y-m-d') }}
                                </span>
                            </div>
                            @auth
                                @if ($article['creator_id'] == auth()->user()->id)
                                    <div class="dropdown" style="position:absolute; right:0px">
                                        <button type="button" class="post-alter--btn" data-toggle="dropdown">
                                            <i class="fa fa-cog"></i>
                                        </button>

                                        <div class="dropdown-menu  dropdown-menu-right">
                                            <a class="dropdown-item" href="/edit-post/{{ $article['id'] }}"
                                                style="color:#000000">
                                                <b>Chỉnh sửa bài viết</b>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>

                    <div class="blog-content">
                        {{-- <b></b> --}}
                        {{-- <img src="{{$blog->blog_display}}" alt="" class="img-fluid"> --}}

                        <div class="py-4">{!! $article['content'] !!}</div>

                    </div>
                    <span class="blog-likes"><i class="fa fa-heart" aria-hidden="true" id="like-count">
                            {{ $like_num }}
                        </i></span>
                    <span class="blog-likes"><i class="fa fa-comment" aria-hidden="true" id="cmt-count">
                            {{-- {{count($comments)}} --}}
                        </i></span>
                    <span class="blog-likes"><i class="fa fa-eye" aria-hidden="true">
                            {{-- {{$blog->blog_seen_num}} --}}
                        </i></span>
                    <div class="blog-likes-cmt">
                        @if (Auth::guest())
                            <button class="blog-likes-cmt--btn" onclick="loginRequest()"><i id="like"
                                    class="fa fa-heart-o" aria-hidden="true"></i>
                                Like
                            </button>
                            <button class="blog-likes-cmt--btn" onclick="commentRequest()"><i class="fa fa-comment"
                                    aria-hidden="true"></i>
                                Comments
                            </button>
                        @else
                            <button class="blog-likes-cmt--btn" onclick="liked({{ $article['id'] }})"><i id="like"
                                    class="fa {{ $liked ? 'fa-heart' : 'fa-heart-o' }}" aria-hidden="true"></i>
                                Like
                            </button>
                            <button class="blog-likes-cmt--btn" onclick="commentRequest()"><a href="#comments-section"><i class="fa fa-comment"
                                        aria-hidden="true"></i>
                                    Comments</a>
                            </button>
                        @endif
                    </div>
                </div> {{-- end col --}}

            </div>


        </section>
    </div>{{-- end-col --}}



    <script>
        function loginRequest() {
            alert('Bạn cần phải đăng nhập để thực hiện chức năng này');
        }

        function commentRequest() {
            alert('Chức năng này hiện chưa ra mắt');
        }

        function liked(blog_id) {
            axios.post(
                '/api/like',
                 {
                    user_id: {{json_encode(auth()->user() ? auth()->user()->id : null) }},
                    article_id: blog_id,
                 }
            )
            .then(function(res) {
                axios.get('/api/like/' + blog_id).then((resp) => {
                    $('#like-count').html(' ' + resp.data);
                });
                $("#like").toggleClass('fa-heart-o');
                $("#like").toggleClass('fa-heart');
            }).catch(function(e) {
                console.log(e)
            })
        }
    </script>
@endsection
