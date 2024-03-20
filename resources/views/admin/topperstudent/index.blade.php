@extends('admin.layouts.master');
@section('content')
@section('title', 'Topper Student List')
<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">

                    @if(!empty($id))
                    <a style="float: right;" href="{{ url('/admin/topperstudent')}}" class="btn btn-primary">Back</a>
                    @else
                    <a style="float: right;" href="{{URL::to('admin/topperstudent/create')}}" class="btn btn-primary pull-right">
                        Add Topper Student</a>
                    @endif
                </div>
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
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" name="topperstudent" id="topperstudent">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Pdf</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="list">

                                    @if(count($data) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($data as $row)
                                        <tr>
                                            <td>{{$count++}}</td>
                                           
                                            <td>{{$row->title}}</td>
                                          
                                               
                                              
                                            <td>
                                                @if(!empty($row->pdf))
                                                <a  href="{{ URL::asset('/admin/upload/topperstudent/pdf/'.$row->pdf)}}" target="_blank">View Pdf</a>
                                                @else
                                                _____
                                                @endif
                                            
                                            </td> 
                                            <td>
                                                @if(check_topper_student_image($row->id) > 0)
                                                <strong><a href="{{route('topperstudent.show', $row->id)}}">View</a></strong><br/>
                                                @else
                                                _____
                                                @endif
                                                </td> 
                                            
                                            <form action="{{ route('topperstudent.destroy',$row->id) }}" method="POST">
                                                <td>
                                                    
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('topperstudent.edit',$row->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                    @csrf
                                                    @method('DELETE')
                 
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure want to delete topperstudent?')"><i class="fas fa-trash-alt" style="font-size: 15px;"></i></button>
                                                </td>
                                            </form>
                                        </tr>
                                        @php
                                        $count++;
                                        @endphp
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                              
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

<script>
    $(document).ready(function() {
        new DataTable('#topperstudent');
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