@extends('layouts.master')

@section('title')
    <title>Home</title>
@endsection

@section('content')
    <div id="wrapper">
        <section class="section first-section">
            <div class="container">
                <div id="post-image-slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators/dots -->
                    <ul class="carousel-indicators">
                        <li data-target="#post-image-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#post-image-slider" data-slide-to="1"></li>
                        <li data-target="#post-image-slider" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item ">
                            <div class="masonry-box post-media">
                                <img src="images/upload/HZuong.jpg" alt="" class="img-fluid">
                                <div class="shadoweffect">
                                    <div class="shadow-desc">
                                        <div class="blog-meta">
                                            <span class="bg-green"><a href="#" title="">Chia sẻ kinh nghiệm</a></span>
                                            <h4><a href="#" title="">TÔI KHÔNG ĐÓNG HỌC PHÍ, TÔI ĐẦU TƯ ĐỂ NHẬN LẠI X1.5 LẦN</a>
                                            </h4>
                                            <small><a href="#" title="">2022-01-17</a></small>
                                            <small><a href="#" title="">hoanh710</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end shadow-desc -->
                                </div><!-- end shadow -->
                            </div><!-- end post-media -->
                        </div>
                        <div class="carousel-item active">
                            <div class="masonry-box post-media">
                                <img src="images/upload/clb.jpg" alt="" class="img-fluid">
                                <div class="shadoweffect">
                                    <div class="shadow-desc">
                                        <div class="blog-meta">
                                            <span class="bg-green"><a href="#"
                                                                      title="">Chia sẻ tài liệu</a></span>
                                            <h4><a href="#" title="">TÀI LIỆU CẤU LIỆU SIÊU XỊN HỌC LÀ AUTO A+</a></h4>
                                            <small><a href="#" title="">2022-01-12</a></small>
                                            <small><a href="#" title="">HoanhDz</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end shadow-desc -->
                                </div><!-- end shadow -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="masonry-box post-media">
                                <img src="images/upload/jlpt.jpg" alt="" class="img-fluid">
                                <div class="shadoweffect">
                                    <div class="shadow-desc">
                                        <div class="blog-meta">
                                            <span class="bg-green"><a href="/blog-category/4"
                                                                      title="">Tiếng Nhật</a></span>
                                            <h4><a href="/new-post/11" title="">[📑JLPT SERIES] – PART 1: 5️⃣ KINH NGHIỆM ÔN THI ĐẠT ĐIỂM CAO JLPT</a></h4>
                                            <small><a href="#" title="">30/12/2021</a></small>
                                            <small><a href="/user/1" title="">HoanhDz</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end shadow-desc -->
                                </div><!-- end shadow -->
                            </div>
                        </div>
                    </div>
                    <!-- Left and right controls/icons -->
                    <a class="carousel-control-prev" href="#post-image-slider" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#post-image-slider" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                            @foreach($cat_list as $category)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="section-title">
                                        <h3 class="color-aqua"><a href="/blog-category/{{$category['id']}}"
                                                                  title="">{{$category['category_name']}}</a></h3>
                                    </div><!-- end title -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            @foreach($category['listArticles'] as $article)
                                                <div class="blog-box">
                                                    <div class="blog-meta big-meta" >
                                                        <h4 class="entry-title text-center" style="position: relative">
                                                            <a href="/article/{{$article['id']}}" title="" >
                                                               {{$article['title']}}
                                                            </a>
                                                        </h4>
                                                        <div class="text-center-1" style="padding: 0.5rem 0">
                                                            <small class="blog-title--content">
                                                                    {{Carbon\Carbon::parse($article['created_at'])->format('Y-m-d')}}
                                                            </small>
                                                            <small class="blog-title--content">
                                                                    by {{$article['user']['name']}}
                                                            </small>
                                                        </div>
                                                        <div class="post-media">
                                                            {{-- <a href="/new-post/{{$blog->id}}" title=""> --}}
                                                                <img src="images/upload/clb.jpg" alt="link ảnh bị lỗi"class="img-fluid">
                                                                {{-- <img src="{{asset('images/Hoanh.jpg')}}" alt=""class="img-fluid"> --}}
                                                                <div class="hovereffect">
                                                                    <span></span>
                                                                </div><!-- end hover -->
                                                            {{-- </a> --}}
                                                        </div><!-- end media -->
                                                        <p style="margin-top: 0.5rem">
                                                            mô tả bài viết [...]
                                                        </p>
                                                        <a class="readmore-btn" href="/article/{{$article['id']}}">READ MORE</a>
                                                    </div><!-- end meta -->
                                                </div><!-- end blog-box -->
                                                <hr class="invis">
                                            @endforeach
                                        </div><!-- end col --> 
                                    </div><!-- end row -->
                                </div><!-- end col -->
                                {{-- @endif--}}
                            @endforeach
                        </div>
                
                    </div>
                    {{-- <div class="col-4 aboutUs"> --}}
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <section id="about-us">
                                <h3 class="about--heading mx-5">ABOUT US</h3>
                                <div class="admin-infor--wrapper mx-1">
                                    <img src="{{asset('images/Hoanh.jpg')}}" alt=""
                                         class="admin-infor--avatar">
                                    <span class="admin-infor--item"><b>Nguyễn Hoàng Anh</b></span>
                                    <span class="admin-infor--name"><b>20194474</b></span>
                                    <span class="admin-infor--item">Sinh viên năm 3 lớp Việt Nhật 04 - K64</span>
                                </div>
                                <div class="admin-infor--wrapper mx-1">
                                    <img src="{{asset('images/hoakhanh.png')}}" alt=""
                                         class="admin-infor--avatar">
                                    <span class="admin-infor--item"><b>Lê Thị Khánh Hòa</b></span>
                                    <span class="admin-infor--name"><b>20194565</b></span>
                                    <span class="admin-infor--item">Sinh viên năm 3 lớp Việt Nhật 04 - K64</span>
                                </div>
                                <div class="admin-infor--wrapper mx-1">
                                    <img src="{{asset('images/TrangNgan.jpg')}}" alt=""
                                         class="admin-infor--avatar">
                                    <span class="admin-infor--item"><b>Phan Thị Trang Ngân</b></span>
                                    <span class="admin-infor--name"><b>20194634</b></span>
                                    <span class="admin-infor--item">Sinh viên năm 3 lớp Việt Nhật 03 - K64</span>
                                </div>
                                <div class="admin-infor--wrapper mx-1">
                                    <img src="{{asset('images/UHM.png')}}" alt="" class="admin-infor--avatar">
                                    <span class="admin-infor--item"><b>Uông Hồng Minh</b></span>
                                    <span class="admin-infor--name"><b>20194625</b></span>
                                    <span class="admin-infor--item">Sinh viên năm 3 lớp Việt Nhật 04 - K64</span>
                                </div>
                            </section>
                        </div><!-- end col -->
                    {{-- </div> --}}

                </div><!-- end row -->

                <hr class="invis1">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="images/upload/blog-banner.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end col -->
                </div><!-- end row -->
                <hr class="invis1">
            </div><!-- end container -->
        </section>

        <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

@endsection

