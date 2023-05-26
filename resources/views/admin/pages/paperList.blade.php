@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row" >
            <div class="col-md-4">
{{--                <a href="{{route('create_new')}}" class="btn btn-primary ">Add Images </a>--}}
            </div>
            <div class="col-md-8">
                <form action="{{route('showList')}}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            @if(request('search_date') && count($epaper)>0)
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePaperModal">Delete Paper</button>
                                <!-- Modal -->
                                <div class="modal fade" id="deletePaperModal" tabindex="-1" aria-labelledby="deletePaperModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deletePaperModalLabel">Delete paper</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to remove {{request('search_date')}} newspaper?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="{{route('deletePaper',['date'=>request('search_date')])}}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" @if(request('search_date')) value="{{request('search_date')}}" @else value="{{Carbon\Carbon::parse($epaper[0]->datetime)->format('Y-m-d')}}" @endif name="search_date">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-success" value="Search">
                            <a href="{{route('showList')}}" class="btn btn-info"> Show All</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="panel-body" style="overflow: auto">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <table class="table table-bordered" id="datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Image</th>
                                <th>Tools</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($epaper as $i=>$eachimage)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$eachimage->title}}</td>
                                    <td>{{Carbon\Carbon::parse($eachimage->datetime)->format('Y-m-d')}}</td>
                                    <td>
                                        <img src="{{asset('storage/images/e-paper/'.$eachimage->image)}}" height="100" width="150">

                                    </td>

                                    <td>
                                        <button href="{{route('updatePaper',$eachimage->id)}}" data-bs-toggle="modal" data-bs-target="#updateModal_{{$eachimage->id}}" class="btn btn-primary"><i class="fa fa-pencil"> </i></button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="updateModal_{{$eachimage->id}}" tabindex="-1" aria-labelledby="updateModalLabel_{{$eachimage->id}}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel_{{$eachimage->id}}">Update Paper</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('updatePaper')}}" method="POST" enctype="multipart/form-data" id="valid_form">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <img src="{{asset('storage/images/e-paper/'.$eachimage->image)}}" alt="">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <label for="">Position</label>
                                                                            <input type="text" class="form-control" name="qty" value="{{$eachimage->qty}}" >
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="">Title</label>

                                                                            <input type="text" class="form-control" name="title" value="{{$eachimage->title}}" >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="">Date</label>
                                                                            <input type="hidden" value="{{$eachimage->id}}" name="paper_id" >
                                                                            <input type="date" class="form-control" name="paper_data" value="{{Carbon\Carbon::parse($eachimage->datetime)->format('Y-m-d')}}" >
                                                                        </div>
                                                                        <div class="col-md-12 mt-4">
                                                                            <input type="file" class="form-control" name="image" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                    <a href="{{route('epaper.edit', $eachimage->id)}}" data-toggle="tooltip" title="Edit Information" class="btn btn-primary"><i class="fa fa-pencil"> </i></a>--}}

                                        {{--                                    <form action="{{route('epaper.destroy', $eachimage->id)}}" method="POST" onsubmit="return confirm('Are You Sure??')" style="display: inline;">--}}
                                        {{--                                        <input type="hidden" name="_method" value="delete" >--}}
                                        {{--                                        {{csrf_field()}}--}}
                                        <a class="btn btn-danger" href="{{route('del_paper',$eachimage->id)}}" title="Delete Information" ><i class="fa fa-trash"></i></a>
                                        {{--                                    </form>--}}
                                        <a href="{{route('addLink', $eachimage->id)}}" data-toggle="tooltip" title="Manage Links" class="btn btn-info"><i class="fa fa-link"> </i></a>
                                        <a href="{{route('singlePaper',['id'=>$eachimage->id])}}"  title="Show" class="btn btn-info"><i class="fa fa-eye"> </i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                <div class="row">
                    <div class="col-md-12">
                        {{ $epaper->links() }}

                    </div>
                </div>
                    </div>
        </div>
    </div>

@endsection
