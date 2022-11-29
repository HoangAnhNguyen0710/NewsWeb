<div class="topbar-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                        <ul class="list-inline nav">
                            <li class="list-inline-item">
                                <a href="{{route('home')}}">
                                    HOME
                                </a>
                            </li>

                            <li class="list-inline-item nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="display: inline; padding: 0px">CATEGORIES</a>
                                    <div class="dropdown-menu">
                                    @foreach($cat_list as $category)
                                      <a class="dropdown-item" href="/blog-category/{{$category['id']}}">{{$category['category_name']}}</a>
                                    @endforeach
                                    </div>
                            </li>
                            @guest
                            <li class="list-inline-item">
                                <a href="{{route('login')}}">
                                    LOGIN
                                </a>
                                </li>
                            @endguest
                            @auth
                            <li class="list-inline-item nav-item dropdown">
                                <a class="nav-link dropdown-toggle" style="padding: 0px" data-toggle="dropdown" href="">
                                    <img class="topbar-login-avatar" src="{{asset('images/gau-icon.png')}}" alt="">
                                    Hi {{auth()->user()->name}}
                                </a>
                                <div class="dropdown-menu">
                                    @if(auth()->user()->role == "admin") 
                                    <a class="dropdown-item" href="{{route('admin-page')}}">Trang admin</a>
                                    @endif
                                    <a class="dropdown-item" href="{{route('post-article')}}">Đăng bài</a>
                                    <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a> 
                                </div>
                            </li>
                            @endauth
                        </ul>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-2 col-md-2 ">
                        <div class="topsearch text-right list-inline-item" style="position: absolute; right: 0px">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> SEARCH</a>
                        </div><!-- end search -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end header-logo -->
</div><!-- end topbar -->
