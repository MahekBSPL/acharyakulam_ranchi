                                    
@extends('admin.layouts.master')
@section('content')
@section('title', 'slider')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">

                    @if(!empty($id))
                    <a style="float: right;" href="{{ URL::to('/admin/slider')}}" class="btn btn-primary">Back</a>
                    @else
                    <a style="float: right;" href="{{URL::to('/admin/slider/create')}}" class="btn btn-primary pull-right">
                        Add Slider</a>
                    @endif
                </div>
                <!-- /.col-12 col-md-12 col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="search-from">
                                <form action="{{ url('/admin/slider')}}" class="search_inbox" name="form1" id="form1" method="post" accept-charset="utf-8">

                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="Title">Title: </label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input onchange="search(this);" class="form-control" type="text" name="title" value="{{Session::get('title')??''}}">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <input onchange="search(this);" class="form-control btn btn-success" type="submit" name="search" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="slidertable" name="slidertable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Slider Title</th>
                                            <th>URL</th>
                                            <th>Image</th>
                                            <th>View Image</th>
                                            <th>Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody id="slider">
                                        @if(count($sliders) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$slider->title}}</td>
                                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                @if(!empty($slider->url))
                                                {{$slider->url}}
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($slider->image))
                                                <img src="{{ URL::asset('admin/upload/slider/'.$slider->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td><a href="{{ URL::asset('/admin/upload/slider/'.$slider->image)}}" target="_blank"><i class="fas fa-eye" ></i></a></td>
                                            <td>
                                                <form action="{{ route('slider.destroy',$slider->id) }}" method="POST">
                                                    <!-- <a class="btn btn-primary" href="{{ route('slider.edit',$slider->id) }}">Edit</a> -->
                                                    <a class="btn btn-primary" href="{{ route('slider.edit', $slider->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete slider?')">Delete</button></a> -->
                                                     <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete slider?')">
                                                        <i class="fas fa-trash-alt" style="font-size: 17px;"></i></button>
                                                    </a>
                                                </form>
                                            </td>
 
                                        </tr>
                                        @endforeach
                                        @else
 
                                        <tr>
                                            <td colspan="4" class="text-center"> No Record Added. </td>
                                        </tr>  
 
                                        @endif
                                    </tbody>
                                    
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function () {
        $('#slidertable').DataTable();
    });
</script>
@endsection