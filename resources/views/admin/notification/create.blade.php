@extends('admin.layouts.master')
@section('content')
@section('title', 'Add Notification')

<script>
 function handleSelectChange(select) {
            // document.getElementById('ContentBlock').style.display = "none";
            // document.getElementById('fileuploadBlock').style.display = "none";
            // document.getElementById('urlBlock').style.display = "none";
        if (select.value === 'Content') {
            document.getElementById('ContentBlock').style.display = "block";
            document.getElementById('fileuploadBlock').style.display = "none";
            document.getElementById('urlBlock').style.display = "none";
        } else if (select.value === 'File upload') {
            document.getElementById('fileuploadBlock').style.display = "block";
            document.getElementById('ContentBlock').style.display = "none";
            document.getElementById('urlBlock').style.display = "none";
        } else if (select.value === 'Url') {
            document.getElementById('urlBlock').style.display = "block";
            document.getElementById('ContentBlock').style.display = "none";
            document.getElementById('fileuploadBlock').style.display = "none";
        } else {
            document.getElementById('ContentBlock').style.display = "none";
            document.getElementById('fileuploadBlock').style.display = "none";
            document.getElementById('urlBlock').style.display = "none";
        }
    }
    </script>
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

                <form name="form1" action="{{URL::to('/admin/notification')}}" id="form1" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Page Language:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="input_class form-group">
                                <input type="radio" name="language" autocomplete="off" id="language" value="1" @if(old('language')==1) checked @endif />English &nbsp;
                                <input type="radio" name="language" autocomplete="off" id="language" value="2" @if(old('language')==2) checked @endif />Hindi &nbsp;
                                <span class="text-danger"> @error('language'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Title:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input name="title" minlength="2" autocomplete="off" type="text" class="input_class form-control" id="title" value="{{old('title')}}" />
                                <span class="text-danger"> @error('title'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Notification Type:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <select name="notificationtype" class="input_class form-control" id="notificationtype" autocomplete="off">
                                    <option value="" selected="" disabled=""> Select </option>
                                    <?php
                                    $notificatioTypeArray = ["1" => "Important Notice", "2" => "Latest News"];
                                    foreach ($notificatioTypeArray as $key => $value) {
                                    ?>
                                        <option value="{{ $value }}" @if(old('notificationtype') == $value) selected @endif>{{ $value }}</option>
                                    <?php  } ?>
                                </select>
                                <span class="text-danger">@error('notificationtype'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Menu Type:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="input_class form-group">

                                <select name="menutype" id="menutype" class="form-control" autocomplete="off" onchange="handleSelectChange(this)">
                                    <option value="" selected="" disabled="">Select</option>
                                    @foreach ($SelectType as $id => $value)
                                    <option value="{{ $value }}" @if(old('menutype') == $value) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('menutype'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                     <!-- <div id="ContentBlock">   -->
                     <div class="" id="ContentBlock" style="display: none;">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Title Keyword:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="keyword" autocomplete="off" type="text" class="input_class form-control" id="keyword" value="{{old('keyword')}}" />
                                    <span class="text-danger">@error('keyword'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <textarea name="description" id="description" class="form-control summernote-simple " rows="3" aria-hidden="true" style="display: none;"><?php echo old('description'); ?></textarea>
                                    <span class="text-danger">@error('description'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                    
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
                                    <span class="text-danger">@error('image'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div id="fileuploadBlock" > -->
                    <div class="" id="fileuploadBlock" style="display: none;">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>File Upload:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="file" name="fileupload" class="input_class inline-block" id="fileupload" autocomplete="off" value="{{old('fileupload')}}" />
                                    <span class="text-danger">@error('fileupload'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- <div id="urlBlock"> -->
                    <div class="" id="urlBlock" style="display: none;">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>URL:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="url" id="url" class="input_class form-control" autocomplete="off" placeholder="https://www.xyz.com" value="{{old('url')}}" />
                                    <span class="text-danger">@error('url'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>
                

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Start Date:</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="date" name="startdate" class="input_class form-control" autocomplete="off" value="{{old('startdate')}}">
                                <span class="text-danger">@error('startdate'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-xm-3">
                            <div class="form-group">
                                <label>End Date:</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xm-6">
                            <div class="form-group">
                                <input type="date" name="enddate" class="input_class form-control" autocomplete="off" value="{{old('enddate')}}">
                                <span class="text-danger">@error('enddate'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xm-12">
                            <div class="pull-right">
                                <input name="submit" type="submit" class="btn btn-success" id="submit" value="Submit" />&nbsp;
                                <a href="{{URL::to('/admin/notification')}}" class="btn btn-primary">back</a>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function() {
    var oldMenutype =   "{{ old('menutype') }}";
    document.getElementById('ContentBlock').style.display = 'none';
    document.getElementById('fileuploadBlock').style.display = 'none';
    document.getElementById('urlBlock').style.display = 'none';

if (oldMenutype == 'Content') {
    document.getElementById('ContentBlock').style.display = 'block';
    document.getElementById('fileuploadBlock').style.display = 'none';
    document.getElementById('urlBlock').style.display = 'none';
} else if (oldMenutype == 'File upload') {
    document.getElementById('ContentBlock').style.display = 'none';
    document.getElementById('fileuploadBlock').style.display = 'block';
    document.getElementById('urlBlock').style.display = 'none';
} else if (oldMenutype == 'Url') {
    document.getElementById('ContentBlock').style.display = 'none';
    document.getElementById('fileuploadBlock').style.display = 'none';
    document.getElementById('urlBlock').style.display = 'block';
} else {
    document.getElementById('ContentBlock').style.display = 'none';
    document.getElementById('fileuploadBlock').style.display = 'none';
    document.getElementById('urlBlock').style.display = 'none';
}

});  

</script>
@endsection