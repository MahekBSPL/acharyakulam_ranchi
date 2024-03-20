@extends('admin.layouts.master')
@section('content')
@section('title', 'Yoga')

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/yoga/create')}}" class="btn btn-primary pull-right"> Add Yoga Image</a>
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
                                <table id="yogatable" name="yogatable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Iamge</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="procedures">
                                        @if(count($yogas) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($yogas as $yoga)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>
                                                @if(!empty($yoga->image))
                                                <a href="{{ URL::asset('admin/upload/yoga/'.$yoga->image) }}" target="_blank">
                                                    <img src="{{ URL::asset('/admin/upload/yoga/'.$yoga->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                </a>
                                                @else
                                                  -
                                                @endif
                                            </td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('yoga.edit', $yoga->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('yoga.destroy',$yoga->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete yoga image?')">
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
        new DataTable('#yogatable');
    });
</script>

@endsection