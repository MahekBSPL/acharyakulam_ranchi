@extends('admin.layouts.master')
@section('content')
@section('title', 'Facility')

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/facility/create')}}" class="btn btn-primary pull-right"> Add Facility</a>
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
                                <table id="facilitytable" name="facilitytable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Url</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="facilitys">
                                        @if(count($facilitys) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($facilitys as $facility)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$facility->title}}</td>
                                            <td>
                                                @if(!empty($facility->image))
                                                <a href="{{ URL::asset('admin/upload/facility/'.$facility->image) }}" target="_blank">
                                                    <img src="{{ URL::asset('/admin/upload/facility/'.$facility->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                </a>
                                                @else
                                                  -
                                                @endif
                                            </td>
                                            <td>{{$facility->type === '1' ? 'Description' : ($facility->type === '2' ? 'Url' : '-') }}</td> 
                                            <td>@if(!empty($facility->description)){{strip_tags(html_entity_decode($facility->description))}} @else - @endif</td>
                                            <td>{{$facility->url}}</td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('facility.edit', $facility->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('facility.destroy',$facility->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete facility?')">
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
        new DataTable('#facilitytable');
    });
</script>

@endsection