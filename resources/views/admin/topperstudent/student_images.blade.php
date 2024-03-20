@extends('admin.layouts.master')
@section('content')
@section('title', 'Topper Student Image')
<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
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
                                <table id="imagetable" name="imagetable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Image</th>
                                            <th>View Image</th>
                                            <th>Image</th> 
                                            <th>Delete</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        @if(count($list) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($list as $row)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>
                                                @if(!empty($row->image))
                                                <img src="{{ URL::asset('/admin/upload/topperstudent/image/'.$row->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td><a href="{{ URL::asset('/admin/upload/topperstudent/image/'.$row->image)}}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                           
                                                 <td>
                                                <!-- Add form for updating image -->
                                                <form id="updateImageForm" action="{{ url('/student_image/update_image/') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                   
                                                    <input type="file" name="new_image" accept="image/*">
                                                    <input type="hidden" name="image_id" value="{{$row->id}}">
                                                    <button type="submit" class="btn btn-primary">Update Image</button>
                                                </form>
                                            </td>
                                            <td> 
                                            <a  class="btn btn-danger" href="{{url('student_image/delete/'.$row->id)}}"
                                                        onclick="return confirm('Are you sure want to delete image?')"><i class="fas fa-trash-alt" style="font-size: 15px;"></i></a>
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
@endsection