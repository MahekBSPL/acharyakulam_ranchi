@extends('admin.layouts.master')
@section('content')
@section('title', 'Add Photo')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{URL::to('admin/photoGallery/')}}" name="form1" id="form1" method="post"
                    enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                          <div class="form-group">
                     <label>Category name:</label>

                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="title" maxlength="100" minlength="2"
                                        onkeypress="return onlyAlphabets(event,this);" autocomplete="off" type="text"
                                        class="input_class form-control"
                                        id="title" value="{{old('title')}}" />
                                        @if($errors->has('title'))
                                          <p class="text-danger">{{ $errors->first('title') }}</p>
                                        @endif 
                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                          <div class="form-group">
                     <label>Category Descriptions:</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                <textarea name="cat_descriptions" onkeypress="return onlyAlphabets(event,this);"  id="cat_descriptions" class="form-control summernote-simple " rows="3" aria-hidden="true" style="display: none;"><?php echo old('cat_descriptions'); ?></textarea>
                             
                                        @if($errors->has('cat_descriptions'))
                                          <p class="text-danger">{{ $errors->first('cat_descriptions') }}</p>
                                        @endif 
                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                          <div class="form-group">
                     <label>Main Catogory:</label>

                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                               
                                <?php if(!isset($cat_id)){ $cat_id=''; ?>
										<?php echo primary_category($cat_id) ?>
									<?php } ?>
                                    @if($errors->has('parent_id'))
                                          <p class="text-danger">{{ $errors->first('parent_id') }}</p>
                                    @endif
                               
                            </div>
                        </div>
                        <div id="txtPDF" >
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label> Category Image:</label>
                                        <span class="star">*</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="file" require accept="image/png, image/gif, image/jpeg, image/jpg" name="thumbnail"
                                            class="input_class inline-block" id="txtimg"  required />
                                    </div>
                                    <span class="txtimg_error" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                        <div id="txtPDF" >
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Gallery Image:</label>
                                        <span class="star"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="file" required accept="image/png, image/gif, image/jpeg, image/jpg" name="image[]"
                                            class="input_class inline-block" id="txtimg" multiple />
                                    </div>
                                    <span class="txtimg_error" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">

                                    <input name="cmdsubmit" type="submit" class="btn btn-success" id="cmdsubmit"
                                        value="Submit" />&nbsp;
                                    <a href="{{ url('/admin/photoGallery')}}" class="btn btn-primary">Back</a>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/public/assets/js/page/validate.js')}}"></script>
@endsection