@extends('admin.layouts.master')
@section('content')
@section('title', 'Show Popup Data')


<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
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
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="class">
                                        @if(count($data) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($data as $row)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$row->type}}</td>
                                            <td>   
                                                @if(!empty($row->description))
                                            {{$row->description}}
                                            @else
                                                _____
                                                @endif
                                        </td>
                                            <td>
                                                @if(!empty($row->image))
                                                <img src="{{ URL::asset('/public/admin/upload/popup/' . $row->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('popup.edit', $row->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
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