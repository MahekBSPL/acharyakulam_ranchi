@extends('admin.layouts.master')
@section('content')
@section('title', 'Circular')
<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/circular/create')}}" class="btn btn-primary pull-right"> Add Circular</a>
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
                                <table id="circulartable" name="circulartable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>PDF</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="circulars">
                                        @if(count($circulars) > 0)
                                        @php
                                        $count = 1;
                                        @endphp
                                        @foreach($circulars as $circular)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{$circular->name}}</td>
                                            <td>
                                                @if(!empty($circular->pdf))
                                                <a href="{{ URL::asset('/admin/upload/circular/'.$circular->pdf)}}" target="_blank">View PDF</a>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('circular.edit', $circular->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('circular.destroy',$circular->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete circular?')">
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
        new DataTable('#circulartable');
    });
</script>
@endsection