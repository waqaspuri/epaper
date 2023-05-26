<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>

            @page{ margin: 0;}


        </style>
    </head>
    <body  style="justify-content: center; text-align: center; padding: 0">
    @php

    @endphp
{{--    <img height="40px" src="{{asset('assets/img/logo.png')}}" alt="Image" class="img-fluid">--}}
    @foreach($day_paper_all as $day_paper)
            <img class="next" width="100%" src="{{asset('storage/images/e-paper-larg/'.$day_paper->image)}}" alt="test">
        @endforeach
    </body>
</html>
