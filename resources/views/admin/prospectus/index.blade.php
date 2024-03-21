@extends('admin.layouts.master')
@section('content')
@section('title', 'Add  Prospectus')
<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/prospectus/create')}}" class="btn btn-primary pull-right">
                        Add Prospectus</a>
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
                                <table id="prospectustable" name="prospectustable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>PDF</th>
                                            <th>Image</th>
                                            <th>View Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="slider">
                                        @if(count($data) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($data as $row)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$row->title}}</td>
                                            <td>
                                                @if(!empty($row->pdf))
                                                <a href="{{ URL::asset('/admin/upload/prospectus/pdf/'.$row->pdf)}}" target="_blank">View PDF</a>
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($row->image))
                                                <img src="{{ URL::asset('/admin/upload/prospectus/image/'.$row->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td><a href="{{ URL::asset('/admin/upload/prospectus/image/'.$row->image)}}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            <td>
                                                <form action="{{ route('prospectus.destroy',$row->id) }}" method="POST">
                                                    <a class="btn btn-primary" href="{{ route('prospectus.edit', $row->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete row Prospectus?')">
                                                            <i class="fas fa-trash-alt" style="font-size: 17px;"></i></button>
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
        new DataTable('#prospectustable');
    });
</script>
<script src="{{ URL::asset('/assets/modules/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/page/validate.js')}}"></script>
@endsection