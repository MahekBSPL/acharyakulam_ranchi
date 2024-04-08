@extends('admin.layouts.master')
@section('content')
@section('title', 'Winner')


<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/winner/create')}}" class="btn btn-primary pull-right">
                        Add Winner</a>
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
                                <table id="winnertable" name="winnertable" class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Image</th>
                                            <th>View Image</th>
                                            <th>Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="winner">
                                        @if(count($winners) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($winners as $row)
                                        <tr>
                                            <td>{{$count++}}</td>
                                           
                                            <td>
                                                @if(!empty($row->image))
                                                <img src="{{ URL::asset('public/admin/upload/winner/'.$row->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td><a href="{{ URL::asset('/public/admin/upload/winner/'.$row->image)}}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            <td><?php echo $row->order??0; ?> <i id="{{$row->id}}"
                                                    onclick="editcatpos(this);" class="far editbut fa-edit"></i>
                                                <span id="winner_postion_{{$row->id}}" style="display:none">
                                                    <input class="w-25" type="number" onchange="savedata(this);"
                                                        id="{{$row->id}}" name="winner_postion" value="" /></span>
                                                <p class="text-success" id="success_{{$row->id}}"></p>
                                            </td>
                                            <td>
                                                <form action="{{ route('winner.destroy',$row->id) }}" method="POST">
                                               
                                                    <a class="btn btn-primary" href="{{ route('winner.edit', $row->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                  
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete winner?')">
                                                            <i class="fas fa-trash-alt" style="font-size: 17px;"></i></button>
                                                    </a>
                                                </form>
                                            </td>

                                        </tr>
                                      
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
        new DataTable('#winnertable');
    });
</script>

<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script>
     function editcatpos(data) {
       // alert(data);
        $("#winner_postion_"+data.id).toggle();
     }
     function savedata(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var winner_postion =  data.value;
        var id =  data.id;
        var linkurl = "{{ url('/admin/update_winner_orders')}}";
        jQuery.ajax({
            url: linkurl,
            type: "POST",
            data: {id: id,winner_postion:winner_postion,update_winner_orders:'update_winner_orders'},
            cache: false,
            success: function (html) {
               // location.reload();
                setTimeout(function(){
                    location.reload();
                },); 
                $("#winner_postion_"+data.id).hide();
                $("#success_"+data.id).html('This Postion is Updated');
            },
        });
       
        
     }
</script>
@endsection