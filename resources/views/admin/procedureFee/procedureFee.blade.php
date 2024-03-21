@extends('admin.layouts.master')
@section('content')
@section('title', 'Procedure fee')

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <!-- <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/procedurefee/create')}}" class="btn btn-primary pull-right"> Add Procedure Fee</a>
                </div> -->
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
                                <table id="procedurefeetable" name="procedurefeetable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="procedures">
                                        @if(count($procedurefees) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($procedurefees as $procedurefee)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>@if(!empty($procedurefee->description)){{strip_tags(html_entity_decode($procedurefee->description))}} @else - @endif</td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('procedurefee.edit', $procedurefee->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('procedurefee.destroy',$procedurefee->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete procedure fee?')">
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
        new DataTable('#procedurefeetable');
    });
</script>

@endsection