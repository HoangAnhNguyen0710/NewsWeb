@extends('layouts.master')

@section('title')
<title>{{$category['category_name']}}</title>
@endsection
@section('content')
<section class="section wb" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h3 class="color-aqua">
                        <a href="/blog-category/{{$category['id']}}"
                                              title="">{{$category['category_name']}}
                                            </a>
                                        </h3>
                </div><!-- end title -->
                <div class="row">
                    @foreach ($list as $article)
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="blog-box">
                                            <div class="blog-meta big-meta" >
                                                <h4 class="entry-title text-center" style="position: relative">
                                                    {{-- <a href="/new-post/{{$blog->id}}" title="" >{{$blog->blog_heading}}
                                                    </a> --}}
                                                    {{$article['title']}}
                                                </h4>
                                                <div class="text-center" style="padding: 0.5rem 0">
                                                    <small class="blog-title--content">
                                                        {{-- <a href="#" title="">{{$blog->updated_at->toDateString()}}
                                                        </a> --}}
                                                        {{Carbon\Carbon::parse($article['created_at'])->format('Y-m-d')}}
                                                    </small>
                                                    <small class="blog-title--content">
                                                        {{-- <a href="/user/{{$blog->author_id}}" title="">by {{$blog->author_name->user_name}}</a> --}}
                                                        tên người viết bài
                                                    </small>
                                                </div>
                                                <div class="post-media">
                                                    {{-- <a href="/new-post/{{$blog->id}}" title="">
                                                        <img src="{{$blog->blog_display}}" alt=""class="img-fluid">
                                                        <div class="hovereffect">
                                                            <span></span>
                                                        </div><!-- end hover -->
                                                    </a> --}}
                                                    <img src="{{asset('images/TrangNgan.jpg')}}" alt=""class="img-fluid">
                                                    1 phần nội dung bài viết ở đây
                                                </div><!-- end media -->
                                                <p style="margin-top: 0.5rem">{{$article['content']}} [...]</p>
                                                <a class="readmore-btn" href="/new-post/id bài viết">READ MORE</a>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                        <hr class="invis">
                        </div><!-- end col -->

            
                    @endforeach
                </div><!-- end row -->
                {{-- {{ $blogs->links('pagination::bootstrap-4') }}   --}}
            </div><!-- end col -->
            {{-- <div class="col-4 aboutUs"> --}}
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <section id="about-us">
                        <h3 class="about--heading mx-5">ABOUT US</h3>
                        <div class="admin-infor--wrapper mx-5">
                            <img src="{{asset('images/Hoanh.jpg')}}" alt=""
                                 class="admin-infor--avatar">
                            <span class="admin-infor--item"><b>Nguyễn Hoàng Anh</b></span>
                            <span class="admin-infor--name"><b>20194474</b></span>
                            <span class="admin-infor--item">Sinh viên năm 3 lớp Việt Nhật 04 - K64</span>
                        </div>
                        <div class="admin-infor--wrapper mx-5">
                            <img src="{{asset('images/hoakhanh.png')}}" alt=""
                                 class="admin-infor--avatar">
                            <span class="admin-infor--item"><b>Lê Thị Khánh Hòa</b></span>
                            <span class="admin-infor--name"><b>20194565</b></span>
                            <span class="admin-infor--item">Sinh viên năm 3 lớp Việt Nhật 04 - K64</span>
                        </div>
                        <div class="admin-infor--wrapper mx-5">
                            <img src="{{asset('images/TrangNgan.jpg')}}" alt=""
                                 class="admin-infor--avatar">
                            <span class="admin-infor--item"><b>Phan Thị Trang Ngân</b></span>
                            <span class="admin-infor--name"><b>20194634</b></span>
                            <span class="admin-infor--item">Sinh viên năm 3 lớp Việt Nhật 03 - K64</span>
                        </div>
                        <div class="admin-infor--wrapper mx-5">
                            <img src="{{asset('images/UHM.png')}}" alt="" class="admin-infor--avatar">
                            <span class="admin-infor--item"><b>Uông Hồng Minh</b></span>
                            <span class="admin-infor--name"><b>20194625</b></span>
                            <span class="admin-infor--item">Sinh viên năm 3 lớp Việt Nhật 04 - K64</span>
                        </div>
                    </section>
                </div><!-- end col -->
            </div>

        </div><!-- end row -->
        <div class="d-flex justify-content-center py-4">
            {{ $list->appends(['items_per_page' => 5])->onEachSide(1)->links() }}
        </div>
    <div class="dmtop">Scroll to Top</div>
</div>

</section>
@endsection