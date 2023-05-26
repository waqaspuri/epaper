@extends('admin.layouts.app')

@section('content')

    <style>
        #pic_container{
            height: fit-content!important;
        }
        #pic_container > img{
            max-width: none;
        }
        .img_a{
            overflow-y: auto;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-9 img_a">
                <input type="hidden" value="{{asset('/storage/images/e-paper/'.$data->image)}}" id="imagedata">
                <div id="pic_container">
                </div>

            <div class="source_url">
                <input type="hidden" id="source_url2" value="{{asset('/storage/images/e-paper/'.$data->image)}}">
            </div>
        </div>
        <div class="col-md-3">
{{--            <form action="{{route('updateLink')}}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
            @foreach ($epapers as $item)
                @if ($data->id==$item->id)
                    @foreach ($item->epaperLinks as $i=>$e)
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    {{$i}}
                                </td>
                                <td>
                                    <img src="{{asset('storage/images/single_news/'.$e->image)}}" height="50" width="50">

                                    {{--                                    <input type="file" name="img_filetmp{{$e->id}}" style="width: 100%" class="img_file" >--}}
{{--                                    <input type="hidden" name="area[id][]" style="width: 100%" class="img_file" value="{{$e->id}}" > --}}
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{route('del_link',$e->id)}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @endforeach
                @endif
{{--                    <input type="submit" value="Save">--}}
{{--            </form>--}}
            @endforeach

            <form action="{{route('saveLink')}}" method="POST" enctype="multipart/form-data" id="img_area_form">
                @csrf
                <div style="borde: 1px solid #000000;">
                <fieldset>
                    @if ($message=="")
                        <table class="table table-bordered">
                            <thead>
                            <th>SN</th>
                            <th>New File</th>
                            <th>Image</th>
                            <th>Action</th>
                            </thead>
                        </table>
                    @endif
                    <hr>
                    <label>Add Images For Generated Field</label><br>
                    <div style="border-bottom: solid 1px #efefef">
                        <div id="button_container">
                            <!-- buttons come here -->
                            <img src="{{ asset('/assets/icon/add.gif') }}" width="20px" height="20px"
                                 onclick="myimgmap.addNewArea()" alt="Add new area" title="Add new area" />
                            <img src="{{ asset('/assets/icon/delete.gif') }}" width="20px" height="20px"
                                 onclick="myimgmap.removeArea(myimgmap.currentid)" alt="Delete selected area"
                                 title="Delete selected area" />
                            <select hidden id="dd_output" onchange="return gui_outputChanged(this)">
                                <option value='imagemap'>Standard imagemap</option>
                            </select>
                            <div>
                                <div id="more_actions" style="display: none; position: absolute;">
                                    <div><a href="" onclick="toggleBoundingBox(this); return false;">&nbsp; bounding
                                            box</a>
                                    </div>
                                    <div><a href="" onclick="return false">&nbsp; background color </a><input
                                            onchange="gui_colorChanged(this)" id="color1" style="display: none;"
                                            value="#ffffff"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <th>SN</th>
                        <th>Shape</th>
                        <th>Image</th>
                        </thead>
                    </table>

                    <div id="form_container" style="clear: both;">
                    </div>
                </fieldset>
                <fieldset id="fieldset_html" class="fieldset_off">
                    <div>
                        <div id="output_help">
                        </div>
                        <textarea id="html_container" name="htlmcode"></textarea>
                    </div>
                </fieldset>
                <input type="hidden" id="map_id" name="map_id" readonly>
                <input type="hidden" id="epaper_id" name="epaper_id" value="{{$data->id}}" readonly>
                <hr style="border:solid 2px black">
                <div class="row" style="padding:10px">
                    <table style="width:100%">
                        <tr>
                            <th> </th>
                            <th class=" pull-right">
                                <button class="btn btn-success form-control">Submit</button> </th>
                        </tr>
                    </table>

                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // alert("SAD");
        gui_loadImage(document.getElementById('source_url2').value);

    });
    // $('#clickme').fine('a').trigger('click');

</script>

@endsection
