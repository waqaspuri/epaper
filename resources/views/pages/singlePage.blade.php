@extends('layouts.app',['day_paper_all'=>$day_paper_all,'day_paper'=>$day_paper])

@section('content')
    <script type="text/javascript" src="https://cdn.tutorialjinni.com/maphilight/1.4.2/jquery.maphilight.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.min.js" integrity="sha512-sXgF3JImNbesKnmCuR5AE5WPQo6Z8xJMYRvDknGyc0eTWL62pqgEG4Auk9d0VnstzyhRNzPak8AyemFJq7a6/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<style>
    .row{
        width: 100%;
        margin: 0 auto;
    }
    .map {
        width: 100%;
    background-size: cover;
    }
    .border_des{
        border-radius: 10px;
        width: fit-content;
        padding: 5px 7px;
    }
    .border_des svg{
        display: inline-block;
    }
    .border_des_page{
        /*border-radius: 20px;*/
        /*background-color: #fff;*/
        /*width: fit-content;*/
        /*padding: 5px 0;*/


    }
    .border_des_page svg{
        display: inline-block!important;
    }
    .border_des_page a{
        color: #dc3544!important;
    }
    .border_des_data{
        border-radius: 20px;
        background-color: #fff;
        width: fit-content;
    }
    .select_des{
        padding: 5px 40px 5px 15px;

    }
    .border_des_data input, .border_des_data input:focus{
        border: none;
        outline: none;
        background: none;
        box-shadow: none;
    }
    #pear_page, #pear_page:focus{
        border: none;
        outline: none;
        box-shadow: none;
    }
    .tools_area{
        padding: 10px 10px;
        background-color: #EFEFEF;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        align-items: center;
    }
    /*.p_circle{*/
    /*    text-align: center;*/
    /*    background-color: #dc3544;*/
    /*    border-radius: 10px;*/
    /*    padding: 6px;*/
    /*    font-size: 13px;*/
    /*    font-weight: 900;*/
    /*    color: #ffffff;*/
    /*}*/
    /*.select_pdf{*/
    /*    position: absolute;*/
    /*    background: #fff;*/
    /*    padding: 5px;*/
    /*    z-index: 55;*/
    /*    margin-top: 2px;*/
    /*    border: 1px solid #e2e2e2;*/
    /*    display: none;*/
    /*}*/
    .select_pdf a{
        color: #343434;
        padding: 0 3px;
    }
    .pdf_bu:hover .select_pdf{
        display: block;
    }
    #form_paper{
        height: fit-content;
    }
    /*input[type="date"]::-webkit-inner-spin-button,*/
    /*input[type="date"]::-webkit-calendar-picker-indicator {*/
    /*    display: none;*/
    /*    -webkit-appearance: none;*/
    /*}*/
    #c_i{
        display: none;
    }
    .pdf_d_i{
        padding:  0 15px;
    }
    /*.tools_b{*/
    /*    display: inline-block;*/
    /*    width: fit-content;*/
    /*}*/
    /*.active_but{*/

    /*}*/
    .deactive_but{
        pointer-events: none
    }
    .deactive_but a{
        color: #6e6d6d!important;
    }
    .deactive_but svg{
        fill: #6e6d6d!important;
    }
    @media (max-width: 580px) {
        #c_i{
            display: inline-block;
        }
        .pdf_d_i{
            padding:0;
        }
    }


    .modal-dialog-full-width {
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width:none !important;

    }

    .modal-content-full-width  {
        height: auto !important;
        min-height: 100% !important;
        border-radius: 0 !important;
        background-color: #ffffff !important
    }

    .modal-header-full-width  {
        border-bottom:none !important;
        padding: 0!important;
    }
    .active>.page-link, .page-link.active{
    background-color:  #dc3544!important;
    color: #fff!important;
    border-color: #dc3544!important;
        cursor: pointer;

}
    .page-link {
        border: none!important;
        outline: none!important;
    }
    .page-circle{
        border-radius: 50%;
    }
    .page-item{
        padding: 0 3px;
    }

    .btn-close {
        background: none;
    }
    .modal_close{
        position: relative;
        top: 10px;
        right: 40px;
        z-index: 44;
    }
    .modal_close > svg{
        fill: #000000;
    }
</style>

{{--@dd(date("Y-m-d h:i:sa"))--}}
    <div class="container pt-3" >
        <div class="row tools_area">
            <div class="col-md-6 d-none d-md-block ">
                @if(request('id'))
                    @php
                    $select_id = request('id');
                    @endphp
                @else
                    @php
                        $select_id = $day_paper_all[0]->id;
                    @endphp
                @endif
                    <div class="row border_des_page" style="margin: 0">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination" style="margin: 0">
                                    <li class="page-item @if($select_id != $day_paper_all[0]->id) active_but @else deactive_but @endif"><a class="page-link" href="{{route('singlePaper',['id'=>$select_id-1])}}">Previous</a></li>
                                    <li class="page-item active">
                                        <span class="page-link page-circle" href="#">
                                            @foreach($day_paper_all as $key=>$page_p)
                                                @if($select_id == $page_p->id)
                                                    {{$key+1}}
                                                @endif
                                            @endforeach
                                        </span>
                                    </li>
                                    <li class="page-item  @if($select_id != $day_paper_all[count($day_paper_all)-1]->id) active_but @else deactive_but @endif"><a class="page-link"  href="{{route('singlePaper',['id'=>$select_id+1])}}">Next</a></li>
                                </ul>
                            </nav>
                        </div>
{{--                        <div class="col-md-12">--}}

{{--                                <div class="@if($select_id!= $day_paper_all[0]->id) active_but @else deactive_but @endif tools_b">--}}
{{--                                    <a href="{{route('singlePaper',['id'=>$day_paper_all[0]->id])}}">--}}
{{--                                        «--}}
{{--                                        First--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class=" @if($select_id != $day_paper_all[0]->id) active_but @else deactive_but @endif tools_b">--}}
{{--                                    <a href="{{route('singlePaper',['id'=>$select_id-1])}}">--}}
{{--                                        <svg fill="#dc3544" xmlns="http://www.w3.org/2000/svg" width="20" height="20"  class="bi bi-caret-left-fill" viewBox="0 0 16 16">--}}
{{--                                            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            <div class="tools_b p_circle">--}}
{{--                                @foreach($day_paper_all as $key=>$page_p)--}}
{{--                                    @if($select_id == $page_p->id)--}}
{{--                                        {{$key+1}}--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                                <div class=" @if($select_id != $day_paper_all[count($day_paper_all)-1]->id) active_but @else deactive_but @endif tools_b">--}}
{{--                                    <a href="{{route('singlePaper',['id'=>$select_id+1])}}">--}}
{{--                                        <svg fill="#dc3544" xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-caret-right-fill" viewBox="0 0 16 16">--}}
{{--                                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class=" @if($select_id != $day_paper_all[count($day_paper_all)-1]->id)active_but @else deactive_but @endif tools_b">--}}
{{--                                    <a href="{{route('singlePaper',['id'=>$day_paper_all[count($day_paper_all)-1]->id])}}">--}}
{{--                                        Last »--}}

{{--                                    </a>--}}
{{--                                </div>--}}
{{--                        </div>--}}
                    </div>
            </div>
            <div class="col-md-2 col-sm-4 col-4">
                <select  name="" class="form-control border_des select_des" id="pear_page">
                    @foreach($day_paper_all as $key=>$paper)
                        <option @if($select_id == $paper->id) selected  @endif value="{{$paper->id}}">Page {{$key+1}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 col-sm-4 col-2 pdf_bu">
                @if($day_paper)
                    <div class="dropdown">
                        <button class="btn border_des btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="pdf_d_i">
                                <i class="bi bi-arrow-down-circle"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="border-radius: 10px;">
                            <li>
                                <a class="dropdown-item"  href="{{route('pdfPaper',$day_paper->id)}}">
                                    Full PDF
                                </a>
                            </li>

                        </ul>
                    </div>
{{--                    <button class="border_des  btn btn-danger">--}}
{{--                                <svg style="margin-left: 10px;margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">--}}
{{--                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>--}}
{{--                                </svg>--}}
{{--                                <svg style="margin-left: 20px;" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-caret-down d-none d-md-inline-block" viewBox="0 0 16 16">--}}
{{--                                    <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>--}}
{{--                                </svg>--}}
{{--                    </button>--}}
{{--                <div class="select_pdf">--}}
{{--                    <a style="height: 36px"  href="{{route('pdfPaper',$day_paper->id)}}">--}}
{{--                        Full PDF--}}
{{--                    </a>--}}
{{--                </div>--}}

                @endif
            </div>
            <div class="col-md-2 col-sm-4 col-6 d-flex justify-content-end">
                <form action="{{route('singlePaper')}}" method="GET" class="w-100 border_des_data" id="form_paper">
                    <div class="row w-100 text-end">

                        <div class="col-md-12" style="padding-left: 2px">
                            <input  id="date_paper" type="date" class="w-100" @if(request('search_date'))value="{{request('search_date')}}" @else value="{{date('Y-m-d', strtotime($day_paper->datetime))}}" @endif  name="search_date">
                            <label id="c_i" for="#date_paper" style="position: absolute;">
                                    <svg style="position: relative;  top: 14px; right: 28px;" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#dc3544"  class="bi bi-calendar" viewBox="0 0 16 16">
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>
                            </label>
                        </div>
{{--                        <div class="col-md-6">--}}
{{--                            <input type="submit" class="btn btn-success w-100" value="Search">--}}
{{--                        </div>--}}

                    </div>
                </form>
            </div>
        </div>

        <div class="row" style="background-color: #fff; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
            <div class="d-none d-md-block col-md-2">
                @if(isset($day_paper_all))
                    <div class="row">
                        @foreach ($day_paper_all as $i=>$item)
                            <div class="col-md-12 text-center mt-1">
                                <a href="{{route('singlePaper',['id'=>$item->id])}}">
                                    <img style="margin: 0 auto;  @if($select_id == $item->id) margin: 0 auto; border: 1px solid black; border-radius: 6px; box-shadow: 1px 1px 1px 1px #0c0d183b;@else border: 1px solid grey; @endif " src="{{asset('storage/images/e-paper/'.$item->image)}}" height="200px" width="200px">
                                </a>
                                <span style="@if($select_id == $item->id) color:red; @endif ">
                            Page {{$i+1}}
                        </span>
                            </div>

                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-12 col-sm-12 col-md-10">
                <div class="mape">
                    @if(count($day_paper->epaperLinks) > 0)
                        <div class="map-left">
                            <map class="map" id="{{$day_paper->map_id}}" name="{{$day_paper->map_id}}">
                                @foreach($day_paper->epaperLinks as $e)
                                    <area href="{{route('single_news',$e->id)}}" class="single_news" shape="rect" alt="" title="" data-singleimg="{{$e->image}}" data-singleid="{{$e->id}}" coords="{{$e->coordinate}}" />
                                @endforeach
                            </map>
                                <img src="{{asset('storage/images/e-paper/'.$day_paper->image)}}" alt="{{$day_paper->image}}" class="map"
                                     usemap="#{{$day_paper->map_id}}" />
                        </div>
                    @else
                        <img id="modalActivate" src="{{asset('storage/images/e-paper/'.$day_paper->image)}}" alt="{{$day_paper->image}}" data-bs-toggle="modal" data-bs-target="#fullPageModalPreview"
                             usemap="#{{$day_paper->map_id}}" />

                        <div class="modal fade right" id="fullPageModalPreview" tabindex="-1" role="dialog" aria-labelledby="fullPageModalPreviewLabel" aria-hidden="true">
                            <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
                                <div class="modal-content-full-width modal-content ">
                                    <div class=" modal-header-full-width   modal-header text-center">
{{--                                        <h5 class="modal-title w-100" id="exampleModalPreviewLabel">{{$day_paper->title}}</h5>--}}
{{--                                        <h4 class=" w-100" >{{date('d-m-Y', strtotime($day_paper->datetime))}}</h4>--}}
                                        <button type="button" class="btn-close modal_close" data-bs-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill=#ed1b23" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                            </svg>
                                        </button>
{{--                                            <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>--}}
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img width="100%" src="{{asset('storage/images/e-paper/'.$day_paper->image)}}" alt="{{$day_paper->image}}" />
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endif


            </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('.map').maphilight();
        });
    </script>
    <script type="text/javascript">

        $('map').imageMapResize();

    </script>
{{--<div class="grid-container">--}}
{{--    <div class="wrapper">--}}
{{--    </div>--}}
{{--</div>--}}


{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}

{{--                <p id="cordinat_id"></p>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}
{{--    $('.single_news').on('click',function (){--}}
{{--        let news_id = $(this).data('singleid')--}}
{{--        let singleimg = $(this).data('singleimg')--}}
{{--        $('#cordinat_id').html(`<img width="100%" src="storage/images/single_news/${singleimg}" alt="">`)--}}
{{--    })--}}

{{--</script>--}}
    <script>
        $('#pear_page').on('change',function(){
            let p_id = $('#pear_page').val();
            $(location).attr('href', `singlepaper?id=${p_id}`);
        })
        $('#date_paper').on('change',function(){
            $('#form_paper').submit();
        })
    </script>
@endsection
