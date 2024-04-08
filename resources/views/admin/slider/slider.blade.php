@extends('admin.layouts.master')
@section('content')
@section('title', 'slider')

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/slider/create')}}" class="btn btn-primary pull-right">
                        Add Slider</a>
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
                                <table id="slidertable" name="slidertable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Slider Title</th>
                                            <th>URL</th>
                                            <th>Order</th>
                                            <th>Image</th>
                                            <th>View Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="slider">
                                        
                                        @if(count($sliders) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$slider->title}}</td>
                                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                @if(!empty($slider->url))
                                                {{$slider->url}}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>
                                                <?php echo $slider->order ?? 0; ?> <i id="{{$slider->id}}" onclick="editcatpos(this);" class="far editbut fa-edit"></i>
                                                <span id="slider_postion_{{$slider->id}}" style="display:none">
                                                    <input class="w-25" type="number" onchange="savedata(this);" id="{{$slider->id}}" name="slider_postion" value="" /></span>
                                                <p class="text-success" id="success_{{$slider->id}}"></p>
                                            </td>
                                            <td>
                                                @if(!empty($slider->image))
                                                <img src="{{ URL::asset('public/admin/upload/slider/'.$slider->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td><a href="{{ URL::asset('/public/admin/upload/slider/'.$slider->image)}}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            <td>
                                                <form action="{{ route('slider.destroy',$slider->id) }}" method="POST">
                                                    <!-- <a class="btn btn-primary" href="{{ route('slider.edit',$slider->id) }}">Edit</a> -->
                                                    <a class="btn btn-primary" href="{{ route('slider.edit', $slider->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete slider?')">Delete</button></a> -->
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete slider?')">
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
        new DataTable('#slidertable');
    });
</script>

<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script>
    function editcatpos(data) {
        // alert(data);
        $("#slider_postion_" + data.id).toggle();
    }

    function savedata(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var slider_postion = data.value;
        var id = data.id;
        var linkurl = "{{ url('/admin/update_slider_orders')}}";
        jQuery.ajax({
            url: linkurl,
            type: "POST",
            data: {
                id: id,
                slider_postion: slider_postion,
                update_slider_orders: 'update_slider_orders'
            },
            cache: false,
            success: function(html) {
                // location.reload();
                setTimeout(function() {
                    location.reload();
                }, );
                $("#slider_postion_" + data.id).hide();
                $("#success_" + data.id).html('This Postion is Updated');
            },
        });


    }
</script>
@endsection