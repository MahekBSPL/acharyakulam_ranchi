@extends('admin.layouts.master')
@section('content')
@section('title', 'Facility Slider')

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/facilityslider/create')}}" class="btn btn-primary pull-right"> Add Facility Slider</a>
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
                                <table id="facilityslidertable" name="facilityslidertable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Image</th>
                                            <th>Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="facilitys">
                                        @if(count($facilitys) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($facilitys as $facility)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>  @if(!empty($facility->image))
                                                <a href="{{ URL::asset('public/admin/upload/facilitySlider/'.$facility->image) }}" target="_blank">
                                                    <img src="{{ URL::asset('/public/admin/upload/facilitySlider/'.$facility->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                </a>
                                                @else
                                                  -
                                                @endif
                                            </td>
                                            <td>
                                            <?php echo $facility->order ?? 0; ?> <i id="{{$facility->id}}" onclick="editcatpos(this);" class="far editbut fa-edit"></i>
                                                <span id="slider_postion_{{$facility->id}}" style="display:none">
                                                    <input class="w-25" type="number" onchange="savedata(this);" id="{{$facility->id}}" name="slider_postion" value="" /></span>
                                                <p class="text-success" id="success_{{$facility->id}}"></p>
                                            </td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('facilityslider.edit', $facility->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('facilityslider.destroy',$facility->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete facility slider?')">
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
        new DataTable('#facilityslidertable');
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
        var linkurl = "{{ url('/admin/update_facilty_slider_orders')}}";
        jQuery.ajax({
            url: linkurl,
            type: "POST",
            data: {
                id: id,
                slider_postion: slider_postion,
                update_facilty_slider_orders: 'update_facilty_slider_orders'
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