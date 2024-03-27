@extends('admin.layouts.master')
@section('content')
@section('title', 'Notification')
<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/notification/create')}}" class="btn btn-primary pull-right"> Add Notification</a>
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
                                <table id="notificationtable" name="notificationtable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Language</th>
                                            <th>Title</th>
                                            <th>Notification type</th>
                                            <th>Menu type</th>
                                            <th>Keyword</th>
                                            <th>Description</th>
                                            <th>url</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="notifications">
                                        @if(count($notifications) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($notifications as $notification)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>@if ($notification->language == 1)English @else Hindi @endif</td>
                                            <td>{{$notification->title}}</td>
                                            <td>@if($notification->notificationtype == 1) Important Notice @else Latest News @endif</td>
                                            <td>@foreach($SelectType as $select)
                                                @if($select->id == $notification->menutype)
                                                {{ $select->value }}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>@if(!empty($notification->keyword)){{$notification->keyword}} @else - @endif</td>
                                            <td>@if(!empty($notification->description)){{strip_tags(html_entity_decode($notification->description))}} @else - @endif</td>
                                            <td>@if(!empty($notification->url)){{$notification->url}} @else - @endif</td>
                                            <td>@if($notification->status == 1)Draft @else Publish @endif</td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('notification.edit', $notification->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('notification.destroy',$notification->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete notification?')">
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
        new DataTable('#notificationtable');
    });
</script>
@endsection