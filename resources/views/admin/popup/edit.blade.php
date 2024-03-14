@extends('admin.layouts.master')
@section('content')
@section('title', 'Edit Popup Data')

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
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

                <form action="{{ route('popup.update' , $data->id) }}" name="form1" id="form1" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('PUT')
                    <div class="panel-body">
                  
                        <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Type:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="input_class form-group">
                                <select name="type" id="type" class="form-control" autocomplete="off" onchange="handleSelectChange(this)">
                                <?php $SelectType=array('1'=>'text','2'=>'image')?>
                                    <option value="" selected="" disabled="">Select</option>
                                    @foreach ($SelectType as $id => $value)
                                    <option value="{{ $value }}" @if((!empty($data->type)?$data->type:old('type'))==$value) selected @endif >{{ $value }}</option>
                                    @endforeach

                                </select>
                                <span class="text-danger">@error('menutype'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

              <div class="" id="text" style="display: none;">
                    <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <textarea name="description" id="description" class="form-control summernote-simple " rows="3" aria-hidden="true" ><?php echo !empty($data->description) ? $data->description : old('description'); ?></textarea>
                                    <span class="text-danger">@error('description'){{$message}} @enderror</span>

                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="" id="fileupload" style="display: none;">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>image:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="file" name="image" class="input_class inline-block" id="image" autocomplete="off" value="{{old('image')}}" />
                                    <a href="{{ URL::asset('/public/admin/upload/popup/'.$data->image)}}"><img src="{{ URL::asset('/public/admin/upload/popup/'.$data->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="<?php echo !empty($data->image)?$data->image:''; ?>" />
                                    <span class="text-danger">@error('image'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">

                                    <input name="cmdsubmit" type="submit" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                                    <a href="{{ url('/admin/class')}}" class="btn btn-primary">Back</a>
                                    <input type="hidden" name="random" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function handleSelectChange(select) {
        if (select.value === 'text') {
            document.getElementById('text').style.display = "block";
            document.getElementById('fileupload').style.display = "none";
        } else {
            document.getElementById('fileupload').style.display = "block";
            document.getElementById('text').style.display = "none";
        }
    }
        $(document).ready(function() {
        var type =   "{{ old('type',$data->type) }}";
        if (type == 'text') {
        document.getElementById('text').style.display = "block";
        document.getElementById('fileupload').style.display = "none";
        } else {
        document.getElementById('fileupload').style.display = "block";
        document.getElementById('text').style.display = "none";
        }
        }); 
</script>
@endsection