<style>
    .menu_item_admin{
        font-size: 20px;
    }
.row{
    width: 100%;
}
.admin_active_page{
    background-color: #dc3543;
    border-radius: 5px;
}
.admin_active_page a{
    color: #fff;
}
    .admin_active_page svg{
        fill: #fff;
    }
</style>
<aside class="sidebar">
    <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
    </div>
    <div class="side-inner">

        <div class="profile text-center">
            <img src="{{asset('assets/img/logo.png')}}" alt="Image" class="img-fluid">
            <h3 class="name mb-4">Admin Panel<span class="icon-check_circle verified"></span></h3>

            <div class="counter d-flex">
                <div class="col">
                    <strong class="number">{{App\Models\Epaper::count()}}</strong>
                    <span class="number-label">Paper</span>
                </div>
                <div class="col">
                    <strong class="number">{{App\Models\EpaperLink::count()}}</strong>
                    <span class="number-label">Link</span>
                </div>
            </div>

            <div class="bio">
                <p>The Regional Times of Sindh is the only English daily regional newspaper of Sindh, Pakistan.Founded by Kazi Saeed Akbar in 2005</p>
            </div>

        </div>


        <div class="row @if(\Request::route()->getName() == 'create_new') admin_active_page @endif" >
            <div class="col-md-2" style="padding-left:30px; padding-top: 5px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                </svg>            </div>
            <div class="col-md-10 menu_item_admin">
                <a href="{{route('create_new')}}">Add Paper</a>
            </div>
        </div>
        <div class="row @if(\Request::route()->getName() == 'showList') admin_active_page @endif">
            <div class="col-md-2" style="padding-left:30px; padding-top: 5px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                </svg>            </div>
            <div class="col-md-10 menu_item_admin">
                <a href="{{route('showList')}}">Paper List</a>
            </div>
        </div>

    </div>

</aside>
