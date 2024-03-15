@extends('admin.layouts.master')
@section('content')
@section('title', 'Academic Session')


<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/academic/create')}}" class="btn btn-primary pull-right"> Add Academic Session</a>
                </div>
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
                                <table id="academictable" name="academictable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Year</th>
                                            <th>Image</th>
                                            <th>Pdf</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="academics">
                                        @if(count($academics) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($academics as $academic)
                                        <tr>
                                            <td>{{$count}}@endif</td>
                                            <td>{{$academic->title}}</td>
                                            <td>{{$academic->year}}</td>
                                            <td>
                                                @if(!empty($academic->image))
                                                <a href="{{ URL::asset('admin/upload/academic/'.$academic->image) }}" target="_blank">
                                                    <img src="{{ URL::asset('/admin/upload/academic/'.$academic->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                </a>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($academic->pdf))
                                                <a href="{{ URL::asset('/admin/upload/academic/pdf/'.$academic->pdf)}}" target="_blank"><i class="fas fa-eye"></i></a>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('academic.edit', $academic->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('academic.destroy',$academic->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete academic session?')">
                                                            <i class="fas fa-trash-alt" style="font-size: 15px;"></i></button>
                                                    </a>
                                                </form>
                                            </td>

                                        </tr>
                                        @php
                                        $count++;
                                        @endphp
                                        @endforeach
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
    $(document).ready(function() {
        new DataTable('#academictable');
    });
</script>

@endsection