@extends('admin.layouts.master')
@section('content')
@section('title', 'Student Council')


<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/council/create')}}" class="btn btn-primary pull-right">
                        Add Student Council</a>
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
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Student Name</th>
                                            <th>About</th>
                                            <th>Image</th>
                                            <th>View Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="council">
                                        <?php 
                                        $count=1;
                                        foreach($councils as $council)
                                        {
                                            $class_name=get_classname($council->class);
                                            $section_name=get_studentsection_name($council->section);
                                        ?>
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$class_name->title}}</td>
                                            <td>{{ $section_name->title}}</td>
                                            <td>{{$council->student_name}}</td>
                                            <td>{{$council->about}}</td>
                                          
                                            <td>
                                                @if(!empty($council->image))
                                                <img src="{{ URL::asset('public/admin/upload/council/'.$council->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                                            <td><a href="{{ URL::asset('/public/admin/upload/council/'.$council->image)}}" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            <td>
                                                <form action="{{ route('council.destroy',$council->id) }}" method="POST">
                                              
                                                    <a class="btn btn-primary" href="{{ route('council.edit', $council->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
   
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete Council?')">
                                                            <i class="fas fa-trash-alt" style="font-size: 17px;"></i></button>
                                                    </a>
                                                </form>
                                            </td>

                                        </tr>
                                       
                                      <?php }?>
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
        $("#slider_postion_"+data.id).toggle();
     }
     function savedata(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var slider_postion =  data.value;
        var id =  data.id;
        var linkurl = "{{ url('/admin/update_slider_orders')}}";
        jQuery.ajax({
            url: linkurl,
            type: "POST",
            data: {id: id,slider_postion:slider_postion,update_slider_orders:'update_slider_orders'},
            cache: false,
            success: function (html) {
               // location.reload();
                setTimeout(function(){
                    location.reload();
                },); 
                $("#slider_postion_"+data.id).hide();
                $("#success_"+data.id).html('This Postion is Updated');
            },
        });
       
        
     }
</script>
@endsection