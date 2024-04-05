@extends('admin.layouts.master')
@section('content')
@section('title', 'House Activity')

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/house_activity/create')}}" class="btn btn-primary pull-right">Add House Activity</a>
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
                                <table id="activitytable" name="activitytable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="activitys">
                                        @if(count($activitys) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($activitys as $activity)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$activity->name}}</td>
                                            <td>  @if(!empty($activity->image))
                                                <a href="{{ URL::asset('admin/upload/houseactivity/'.$activity->image) }}" target="_blank">
                                                    <img src="{{ URL::asset('/admin/upload/houseactivity/'.$activity->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                </a>
                                                @else
                                                  -
                                                @endif
                                            </td>
                                            <td>@if(!empty($activity->description)){{strip_tags(html_entity_decode($activity->description))}} @else - @endif</td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('house_activity.edit', $activity->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('house_activity.destroy',$activity->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete house activity?')">
                                                            <i class="fas fa-trash-alt" style="font-size: 15px;"></i></button>
                                                    </a>
                                                </form>
                                            </td>

                                        </tr>
                                        @php $count++; @endphp
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
        new DataTable('#activitytable');
    });
</script>

@endsection