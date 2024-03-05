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
        new DataTable('#slidertable');
    });
</script>
@endsection