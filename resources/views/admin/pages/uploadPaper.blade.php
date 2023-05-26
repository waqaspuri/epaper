@extends('admin.layouts.app')

@section('content')
    <style>
        .input_section{
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid;
        }

    </style>
    <!-- Load FilePond library -->

    <div class="container">

        <div class="row">
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading padding-bottom">--}}
{{--                    <div class="row" style="padding:10px">--}}
{{--                        <table style="width:100%">--}}
{{--                            <tr>--}}
{{--                                <th class="headtext">--}}
{{--                                    Epaper--}}
{{--                                </th>--}}
{{--                                <th class=" pull-right">--}}
{{--                                </th>--}}
{{--                            </tr>--}}
{{--                        </table>--}}

{{--                    </div>--}}
{{--                </div>--}}

                <div class="panel-body" style="overflow: auto">
                    <form action="{{route('createPaper')}}" method="POST" enctype="multipart/form-data" id="valid_form">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-4">
                                <label>Date</label>
                                <input type="date" class="form-control" name="paper_date" value="{{date('Y-m-d')}}">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        @csrf
                                <div class="input_area">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label>Position</label>
                                            <input type="number" name="page_number[]" class="form-control page_number"  placeholder="Page" value="1">
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <div class="form-grpup">
                                                <label>Upload Image</label>
                                                <input type="file" class="form-control"   name="image[]" placeholder="Image" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xs-12" id="publish-time">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="paper_title[]" class="form-control"  placeholder="Title" value="{{old('paper_title')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-center">
{{--                                                <span class="del_section">--}}
{{--                                                    <i class="fa-solid fa-trash-can" style="font-size: 30px; margin-top: 25px;"></i>--}}
{{--                                                </span>--}}
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12 text-center mt-3">
                                     <span class="add_new_section btn btn-primary">
                                        <i class="fa-solid fa-plus" ></i>
                                    </span>
                                </div>
                            </div>

                            <div class="row" style="padding:10px">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success form-control">Save</button>
                                </div>
                            </div>
                    </form>
                </div>
{{--            </div>--}}
        </div>

    </div>



    <script>
        $(document).ready(function() {

            var input_area_max_fields = 10;
            var input_area_wrapper = $(".input_area");
            var input_area_add_button = $(".add_new_section");

            var x = 1;
            $(input_area_add_button).click(function(e) {
                e.preventDefault();
                if (x < input_area_max_fields) {
                    x++;
                    $(input_area_wrapper).append(`
                              <div class="row input_section">
                              <div class="col-md-1">
                                            <label>Position</label>
                                            <input type="number" name="page_number[]" class="page_number form-control"  placeholder="Page" value="{{old('page')}}">
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <div class="form-grpup">
                                                <label>Upload Image</label>
                                                <input type="file" class="form-control"   name="image[]" placeholder="Image" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xs-12" id="publish-time">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="paper_title[]" class="form-control"  placeholder="Title" value="{{old('paper_title')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-center">
                                                <span class="del_section" style="color:red; cursor:pointer">
                                                    <i class="fa-solid fa-trash-can" style="font-size: 30px; margin-top: 25px;"></i>
                                                </span>
                                        </div>
                                    </div>

                        `); //add input box
                } else {
                    alert('You Reached the limits')
                }
                var count = input_area_wrapper.children().length;
                for(k =1;k<count;k++){
                    $('.page_number').eq( k ).val(k+1)
                }
            });
            $(input_area_wrapper).on("click", ".del_section", function(e) {
                e.preventDefault();
                $(this).parent().parent('div').remove();
                x--;

                var count = input_area_wrapper.children().length;
                for(k =1;k<count;k++){
                   $('.page_number').eq( k ).val(k+1)
                }
            })

        });
    </script>
@endsection
