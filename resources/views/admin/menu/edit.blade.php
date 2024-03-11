@extends('admin.layouts.master')
@section('content')
@section('title', 'Edit menu')
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

    function handleMenuCategory(select) {
        document.getElementById('parent_menuBlock').style.display = "none";
        if (select.value === '2') {
            document.getElementById('parent_menuBlock').style.display = "block";
        } else {
            document.getElementById('parent_menuBlock').style.display = "none";
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

                <form action="{{ route('menu.update', $menus->id) }}" name="EditMenu" id="EditMenu" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>menu category:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <select name="menu_category" class="input_class form-control" id="menu_category" autocomplete="off" onchange="handleMenuCategory(this)">
                                    <option value="" selected="" disabled=""> Select </option>
                                    <?php
                                    $menu_categoryArray = ["1" => "Main menu", "2" => "Sub Menu"];
                                    foreach ($menu_categoryArray as $key => $value) {
                                    ?>
                                        <option value="{{ $key }}" @if((!empty($menus->menu_category)?$menus->menu_category:old('menu_category'))==$key) selected @endif >{{ $value }}</option>
                                    <?php  } ?>
                                </select>
                                <span class="text-danger">@error('menu_category'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="" id="parent_menuBlock" style="display:none">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Parent Menu:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <select name="parent_menu" class="input_class form-control" id="parent_menu" autocomplete="off">
                                        <option value="" selected="" disabled=""> Select </option>
                                        <!-- Retrieve data from MySQL table and generate options -->
                                        @foreach($submenu as $key)
                                        @if($key->parent_menu == '')
                                        <option value="{{ $key->id }}" @if((!empty($menus->parent_menu)?$menus->parent_menu:old('parent_menu')) == $key->id) selected @endif>{{ $key->title }}</option>
                                       
                                        @endif
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('parent_menu'){{$message}} @enderror</span>
                                </div>
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
                                <input name="title" minlength="2" autocomplete="off" type="text" class="input_class form-control" id="title" value="{{ !empty($menus->title)?$menus->title:old('title')}}" />
                                <span class="text-danger"> @error('title'){{$message}} @enderror</span>
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
                                    <option value="{{ $value }}" @if((!empty($menus->menutype)?$menus->menutype:old('menutype'))==$value) selected @endif >{{ $value }}</option>
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
                                    <input name="keyword" autocomplete="off" type="text" class="input_class form-control" id="keyword" value="{{ !empty($menus->keyword)?$menus->keyword:old('keyword')}}" />
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
                                    <textarea name="description" id="description" class="form-control summernote-simple " rows="3" aria-hidden="true" style="display: none;" value="{{ !empty($menus->description)?$menus->description:old('description')}}"></textarea>
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
                                    @if($menus->image)
                                    <a href="{{ URL::asset('/admin/upload/menu/'.$menus->image)}}"><img src="{{ URL::asset('admin/upload/menu/'.$menus->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    @endif
                                    <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($menus->image)?$menus->image:old('image')}}" />
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
                                    <input type="file" name="fileupload" class="input_class inline-block" id="fileupload" value="{{old('fileupload')}}" autocomplete="off" />
                                    @if($menus->fileupload)
                                    <a href="{{ URL::asset('/admin/upload/menu/'.$menus->fileupload)}}"><img src="{{ URL::asset('admin/upload/menu/'.$menus->fileupload)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    @endif
                                    <input type="hidden" name="oldfileupload" class="input_class w-50 inline-block" value="{{ !empty($menus->fileupload)?$menus->fileupload:old('fileupload')}}" />

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
                                    <input type="text" name="url" id="url" class="input_class form-control" autocomplete="off" placeholder="https://www.xyz.com" value="{{ !empty($menus->url)?$menus->url:old('url')}}" />
                                    <span class="text-danger">@error('url'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Menu position:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <select name="menu_position" class="input_class form-control" id="menu_position" autocomplete="off">
                                    <option value="" selected="" disabled=""> Select </option>
                                    <?php
                                    $menupositionArray = ["1" => "Header Menu", "2" => "Footer Menu"];
                                    foreach ($menupositionArray as $key => $value) {
                                    ?>
                                        <option value="{{ $key }}" @if((!empty($menus->menu_position)?$menus->menu_position:old('menu_position'))==$value) selected @endif >{{ $value }}</option>
                                    <?php  } ?>
                                </select>
                                <span class="text-danger">@error('menu_position'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Banner image :</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="file" name="banner_image" class="input_class inline-block" id="banner_image" autocomplete="off" value="{{old('banner_image')}}" />
                                @if($menus->banner_image)
                                <a href="{{ URL::asset('/admin/upload/menu/banner/'.$menus->banner_image)}}"><img src="{{ URL::asset('/admin/upload/menu/banner/'.$menus->banner_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                @endif
                                <input type="hidden" name="oldbanner_image" class="input_class w-50 inline-block" value="{{ !empty($menus->banner_image)?$menus->banner_image:old('banner_image')}}" />
                                <span class="text-danger">@error('banner_image'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Status:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <select name="status" class="input_class form-control" id="status" autocomplete="off">
                                    <option value="" selected="" disabled=""> Select </option>
                                    <?php
                                    $statusArray = ["1" => "Draft", "2" => "Publish"];
                                    foreach ($statusArray as $key => $value) {
                                    ?>
                                        <option value="{{ $key }}" @if((!empty($menus->status)?$menus->status:old('status'))==$value) selected @endif >{{ $value }}</option>
                                    <?php  } ?>
                                </select>
                                <span class="text-danger">@error('status'){{$message}} @enderror</span>
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

<script>
    $(document).ready(function() {
        var oldMenutype = "{{ old('menutype',$menus->menutype) }}";
        var oldmenucategory = "{{ old('menu_category',$menus->menu_category) }}";
        //alert(oldMenutype);
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

        if (oldmenucategory == '2') {
            document.getElementById('parent_menuBlock').style.display = 'block';
        } else {
            document.getElementById('parent_menuBlock').style.display = 'none';
        }

    });
</script>
@endsection