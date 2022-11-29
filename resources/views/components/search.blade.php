<div class="collapse top-search" id="collapseExample">
    <div class="card card-block">
        <div class="newsletter-widget text-center">
            <form id="mySearch" class="form-inline" method="GET"
             {{-- action="{{route('search')}} --}}
             ">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="mySearch" placeholder="Tìm kiếm theo danh mục...">
                <button onclick="document.getElementById('mySearch')" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- end newsletter -->
    </div>
</div><!-- end top-search -->

