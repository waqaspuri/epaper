<style>
    .logo_area{
        box-shadow: 2px 50px 103px -67px rgba(0,0,0,0.42)!important;
        -webkit-box-shadow: 2px 50px 103px -67px rgba(0,0,0,0.42);
        -moz-box-shadow: 2px 50px 103px -67px rgba(0,0,0,0.42);
    }
.row{
    width: 100%;
}
</style>
<div class="row">
    <div class="col-md-12 d-flex justify-content-center logo_area">
        <a href="{{route('singlePaper')}}">
            <img src="{{asset('assets/img/logo.png')}}" alt="Image" class="img-fluid">
        </a>
    </div>
</div>
@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('showList')}}">Admin Panel</a>
        </div>
    </div>
@endif
{{--{{date_default_timezone_set("Asia/Karachi")}}--}}

{{--<aside class="sidebar">--}}
{{--    <div class="toggle">--}}
{{--        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">--}}
{{--            <span></span>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <div class="side-inner">--}}

{{--        <div class="profile">--}}
{{--            <img src="{{asset('assets/img/logo.png')}}" alt="Image" class="img-fluid">--}}
{{--            <h3 class="name mb-4">@if(request('search_date')) {{request('search_date')}} @else Today's  @endif newspaper <span class="icon-check_circle verified"></span></h3>--}}

{{--            <div class="counter d-flex">--}}
{{--                <div class="col">--}}
{{--                    <strong class="number">892</strong>--}}
{{--                    <span class="number-label">Pages</span>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <strong class="number">56k</strong>--}}
{{--                    <span class="number-label">Followers</span>--}}
{{--                </div>--}}
{{--            </div>--}}



{{--        </div>--}}
{{--        @if(isset($day_paper_all))--}}
{{--            <div class="row">--}}
{{--                @foreach ($day_paper_all as $i=>$item)--}}
{{--                    <div class="col-md-12 text-center mt-1">--}}
{{--                        <a href="{{route('singlePaper',['id'=>$item->id])}}">--}}
{{--                            <img style="margin: 0 auto; @if(request('id') == $item->id) border:1px solid red; @endif " src="{{asset('storage/images/e-paper/'.$item->image)}}" height="200px" width="200px">--}}
{{--                        </a>--}}
{{--                        <span style="@if(request('id') == $item->id) color:red; @endif ">--}}
{{--                            Page {{$i+1}}--}}
{{--                        </span>--}}
{{--                    </div>--}}

{{--                @endforeach--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}

{{--</aside>--}}
