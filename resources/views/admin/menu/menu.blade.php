@extends('admin.layouts.master')
@section('content')
@section('title', 'menu')

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/menu/create')}}" class="btn btn-primary pull-right"> Add Menu</a>
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
                                <table id="menutable" name="menutable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Menu type</th>
                                            <th>Keyword</th>
                                            <th>Description</th>
                                            <th>url</th>
                                            <th>Menu Position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="menus">
                                        @if(count($menus) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($menus as $menu)
                                        <tr>
                                            <td> @if(count($menus) > 0){{$count++}}@endif</td>
                                            <td>{{$menu->title}}</td>
                                            <td>{{$menu->menutype}}</td>
                                            <td>@if(!empty($menu->keyword)){{$menu->keyword}} @else - @endif</td>
                                            <td>@if(!empty($menu->description)){{strip_tags($menu->description)}} @else - @endif</td>
                                            <td>@if(!empty($menu->url)){{$menu->url}} @else - @endif</td>
                                            <td>{{$menu->menu_position}}</td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('menu.edit', $menu->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('menu.destroy',$menu->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete Menu?')">
                                                        <i class="fas fa-trash-alt" style="font-size: 15px;"></i></button>
                                                    </a>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="4" class="text-center"> No data available in table </td>
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
       new DataTable('#menutable');
    });
</script>
@endsection