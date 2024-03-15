@extends('admin.layouts.master')
@section('content')
@section('title', 'Home Gallery List')


<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/homegallery/create')}}" class="btn btn-primary pull-right">
                        Add Home Gallery</a>
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
                                <table id="homegallerytable" name="homegallerytable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>URL</th>
                                            <th>Order</th>
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
                                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                @if(!empty($row->url))
                                                {{$row->url}}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td><?php echo $row->order??0; ?> <i id="{{$row->id}}"
                                                    onclick="editcatpos(this);" class="far editbut fa-edit"></i>
                                                <span id="gallery_postion_{{$row->id}}" style="display:none">
                                                    <input class="w-25" type="number" onchange="savedata(this);"
                                                        id="{{$row->id}}" name="gallery_postion" value="" /></span>
                                                <p class="text-success" id="success_{{$row->id}}"></p>
                                            </td>
                                            <td>
                                                @if(!empty($row->image))
                                                <img src="{{ URL::asset('admin/upload/homegallery/'.$row->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td><a href="{{ URL::asset('/admin/upload/homegallery/'.$row->image)}}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            <td>
                                                <form action="{{ route('homegallery.destroy',$row->id) }}" method="POST">
                                                    <a class="btn btn-primary" href="{{ route('homegallery.edit', $row->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete homegallery?')">
                                                            <i class="fas fa-trash-alt" style="font-size: 17px;"></i></button>
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
<script>
    $(document).ready(function() {
        new DataTable('#homegallerytable');
    });
</script>

<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script>
     function editcatpos(data) {
       // alert(data);
        $("#gallery_postion_"+data.id).toggle();
     }
     function savedata(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var gallery_postion =  data.value;
        var id =  data.id;
        var linkurl = "{{ url('/admin/update_home_gallery_orders')}}";
        jQuery.ajax({
            url: linkurl,
            type: "POST",
            data: {id: id,gallery_postion:gallery_postion,update_home_gallery_orders:'update_home_gallery_orders'},
            cache: false,
            success: function (html) {
               // location.reload();
                setTimeout(function(){
                    location.reload();
                },); 
                $("#gallery_postion_"+data.id).hide();
                $("#success_"+data.id).html('This Postion is Updated');
            },
        });
       
        
     }
</script>
@endsection