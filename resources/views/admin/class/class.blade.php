@extends('admin.layouts.master')
@section('content')
@section('title', 'Class')


<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/class/create')}}"
                        class="btn btn-primary pull-right">
                        Add Class</a>
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
                                <table id="classtable" name="classtable"
                                    class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Class Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="class">
                                        @if(count($classes) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($classes as $class)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$class->title}}</td>
                                           
                                            <td>
                                                <form action="{{ route('class.destroy',$class->id) }}" method="POST">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('class.edit', $class->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete Class?')">
                                                            <i class="fas fa-trash-alt"
                                                                style="font-size: 17px;"></i></button>
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

<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script>
$(document).ready(function() {
    new DataTable('#classtable');
});
</script>

@endsection