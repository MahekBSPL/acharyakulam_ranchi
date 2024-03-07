@extends('admin.layouts.master')
@section('content')
@section('title', 'event')
<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/event/create')}}" class="btn btn-primary pull-right">
                        Add Event</a>
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
                                <table id="eventtable" name="eventtable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Location</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>View Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="event">
                                    @if(count($events) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($events as $event)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$event->title}}</td>
                                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                @if(!empty($event->sub_title))
                                                {{$event->sub_title}}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>{{$event->location}}</td>
                                            <td>{{$event->date}}</td>
                                            <td>{{$event->description}}</td>
                                            
                                            <td>
                                                @if(!empty($event->image))
                                                <img src="{{ URL::asset('admin/upload/event/'.$event->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td><a href="{{ URL::asset('/admin/upload/event/'.$event->image)}}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            <td>
                                                <form action="{{ route('event.destroy',$event->id) }}" method="POST"> 
                                                    <a class="btn btn-primary" href="{{ route('event.edit', $event->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete event?')">
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
    $(document).ready(function() {
        new DataTable('#eventtable');
    });
</script>
@endsection