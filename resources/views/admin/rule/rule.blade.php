@extends('admin.layouts.master')
@section('content')
@section('title', 'rule')


<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/rule/create')}}"
                        class="btn btn-primary pull-right">
                        Add Rule</a>
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
                                <table id="ruletable" name="ruletable"
                                    class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Description</th>
                                            <th>Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rule">
                                        @if(count($rules) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($rules as $rule)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$rule->description}}</td>
                                            <td><?php echo $rule->order??0; ?> <i id="{{$rule->id}}"
                                                    onclick="editcatpos(this);" class="far editbut fa-edit"></i>
                                                <span id="rule_postion_{{$rule->id}}" style="display:none">
                                                    <input class="w-25" type="number" onchange="savedata(this);"
                                                        id="{{$rule->id}}" name="rule_postion" value="" style="width:60px" /></span>
                                                <p class="text-success" id="success_{{$rule->id}}"></p>
                                            </td>
                                            <td>
                                                <form action="{{ route('rule.destroy',$rule->id) }}" method="POST">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('rule.edit', $rule->id) }}">
                                                        <i class="fas fa-edit" style="font-size: 17px;"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete Rule?')">
                                                            <i class="fas fa-trash-alt"
                                                                style="font-size: 17px;"></i></button>
                                                    </a>
                                                </form>
                                            </td>

                                        </tr>
                                        @php  @endphp
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
    new DataTable('#ruletable');
});
</script>
<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script>
     function editcatpos(data) {
        $("#rule_postion_"+data.id).toggle();
     }
     function savedata(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var rule_postion =  data.value;
        var id =  data.id;
        var linkurl = "{{ url('/admin/update_rules_orders')}}";
        jQuery.ajax({
            url: linkurl,
            type: "POST",
            data: {id: id,rule_postion:rule_postion ,update_rules_orders:'update_rules_orders'},
            cache: false,
            success: function (html) {
               // location.reload();
                setTimeout(function(){
                    location.reload();
                },); 
                $("#rule_postion_"+data.id).hide();
                $("#success_"+data.id).html('This Postion is Updated');
            },
        });
       
        
     }
</script>
@endsection