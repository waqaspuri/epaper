@extends('layouts.app')

@section('content')
    <style>
        .tools_area{
            padding: 10px 10px;
            background-color: #EFEFEF;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            align-items: center;
        }
        .news_area{
            background-color: #fff;
            padding: 10px 10px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        .date_area{
            border-radius: 20px;
            background-color: #fff;
            color: #48494b;
            display: inline-block;
            padding: 3px 36px;
            font-size: 25px;
        }
        .date_area > svg{
            display: inline-block;
        }

    </style>
    <div class="container pt-3">
        <div class="row tools_area">
            <div class="col-md-6 col-6">
                <a class="date_area" href="{{url()->previous()}}">
                    <svg fill="#dc3544" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20px" height="20" viewBox="0 0 60.731 60.73" style="enable-background:new 0 0 60.731 60.73;" xml:space="preserve">
<g>
    <g>
        <polygon points="0,30.365 29.737,60.105 29.737,42.733 60.731,42.729 60.731,18.001 29.737,17.999 29.737,0.625   "/>
    </g>
</g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
</svg>
                    Back
                </a>
            </div>
            <div class="col-md-6 col-6 text-end">
                <h3 class="date_area">{{date('d-m-Y', strtotime($single_news->mainPaper->datetime))}}</h3>
            </div>
        </div>


        <div class="row news_area">
            <div class="col-md-12">
                <img  width="100%" src="{{asset('storage/images/single_news/'.$single_news->image)}}" alt="">
            </div>

        </div>
    </div>

@endsection
