@extends('admin.layouts.master');
@section('content')
@section('title', 'Manage Photo Gallery')
<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">

                    @if(!empty($id))
                    <a style="float: right;" href="{{ url('/admin/photoGallery')}}" class="btn btn-primary">Back</a>
                    @else
                    <a style="float: right;" href="{{URL::to('admin/photoGallery/create')}}" class="btn btn-primary pull-right">
                        Add Gallery</a>
                    @endif
                </div>
                <!-- /.col-12 col-md-12 col-lg-12 -->




            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        
                      @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="panel-heading">
                            <div class="search-from">
                                <form action="{{ url('/admin/photoGallery')}}" class="search_inbox" name="form1" id="form1"
                                    method="post" accept-charset="utf-8">

                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="Title">Title: </label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input onchange="search(this);" class="form-control" type="text"
                                                name="cattitle" value="{{Session::get('cattitle')??''}}">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <input onchange="search(this);" class="form-control btn btn-success"
                                                type="submit" name="search" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>View</th>
                                            <th>Order</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="list">

                                        <?php
							if(count($list) > 0)
							{
							$count = 1;
							foreach($list as $row):
						?>
                                        <tr>
                                            <td>{{$count++}}</td>
                                           
                                            <td>{{$row->title}}</td>
                                                <td>
                                                @if(check_gallery($row->id) > 0)
                                                <strong><a href="{{route('photoGallery.show', $row->id)}}">View</a></strong><br/>
                                                @else
                                                _____
                                                @endif
                                                </td> 
                                                <td>
                                                    <?php echo $row->cat_postion??0; ?> <i id="{{$row->id}}" onclick="editcatpos(this);"  class="far editbut fa-edit"></i>
                                                    <span  id="gallery_postion_{{$row->id}}" style="display:none" >
                                                    <input class="w-25" type="number"
                                                    onchange="savedata(this);" id="{{$row->id}}" name="gallery_postion" value="" /></span>
                                                    <p class="text-success" id="success_{{$row->id}}"></p>
                                               </td>
                                            <td>
                                                @if(!empty($row->thumbnail))
                                                <img src="{{ URL::asset('/admin/upload/photoGallery/thumbnail/'.$row->thumbnail)}}"
                                                    style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            
                                            </td>
                                            
                                            <form action="{{ route('photoGallery.destroy',$row->id) }}" method="POST">
                                                <td>
                                                    
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('photoGallery.edit',$row->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                    @csrf
                                                    @method('DELETE')
                 
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure want to delete photo?')"><i class="fas fa-trash-alt" style="font-size: 15px;"></i></button>
                                                </td>
                                            </form>
                                        </tr>
                                        <?php
							endforeach;
							} else {
						?>
                                        <tr>
                                            <td colspan="5" class="text-center"> No Record Added. </td>
                                        </tr>
                                        <?php

							}
						?>
                                    </tbody>
                                </table>
                                {!! $list->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-12 col-md-12 col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- Button trigger modal -->


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
        var linkurl = "{{ url('/admin/update_gallery_orders')}}";
        jQuery.ajax({
            url: linkurl,
            type: "POST",
            data: {id: id,gallery_postion:gallery_postion,update_gallery_orders:'update_gallery_orders'},
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
@endsection;