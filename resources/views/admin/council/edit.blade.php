@extends('admin.layouts.master')
@section('content')
@section('title', 'Edit Student Council')
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
                <form action="{{ route('council.update' , $councils->id) }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                @csrf
                @method('PUT')
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label> Class:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                <select name="class" class="input_class form-control" id="class" autocomplete="off">
                                        <option value=""> Select Class </option>
                                        <?php
                                            $classes = get_studentclass();
                                            if(!empty($classes)){
                                            foreach($classes as $class) {
                                                ?>
                                                <option value="<?php echo $class->id; ?>"  <?php if((!empty($councils->class)?$councils->class:old('class'))==$class->id) echo "selected"; ?>><?php echo $class->title; ?></option>
                                            <?php  } }?>
                                    </select>
                                   
                                    <span class="text-danger">
                                        @error('class')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label> Section:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                <select name="section" class="input_class form-control" id="section" autocomplete="off">
                                        <option value=""> Select Section </option>
                                        <?php
                                            $sections = get_studentsection();
                                            if(!empty($sections)){
                                            foreach($sections as $section) {
                                                ?>
                                                <option value="<?php echo $section->id; ?>" <?php if((!empty($councils->section)?$councils->section:old('section'))==$section->id) echo "selected"; ?>><?php echo $section->title; ?></option>
                                            <?php  } }?>
                                    </select>
                                    <span class="text-danger">
                                        @error('section')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Student Name:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="student_name" autocomplete="off" type="text" minlength="" class="input_class form-control @error('student_name') is-invalid @enderror" id="student_name"  value="{{ !empty($councils->student_name)?$councils->student_name:old('student_name')}}" />
                                    <span class="text-danger">
                                        @error('student_name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>About:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="about" autocomplete="off" type="text" minlength="" class="input_class form-control @error('about') is-invalid @enderror" id="about" value="{{ !empty($councils->about)?$councils->about:old('about')}}" />
                                    <span class="text-danger">
                                        @error('about')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="txtPDF">
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Image Upload:</label>
                                        <span class="star">*</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                    <input type="file" value="{{old('image')}}" name="image" class="input_class w-50 inline-block" id="image" />
                                        <a href="{{ URL::asset('/admin/upload/council/'.$councils->image)}}"><img src="{{ URL::asset('admin/upload/council/'.$councils->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                        <input type="hidden" name="olduplode" class="input_class w-50 inline-block" value="<?php echo !empty($councils->image) ? $councils->image : ''; ?>" />

                                    </div>
                                    <!-- <span class="image_error" style="color:red;"></span> -->
                                    <span class="text-danger">
                                        @error('image')
                                        {{$message}}
                                        @enderror
                                    </span>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">

                                    <input name="cmdsubmit" type="submit" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                                    <a href="{{ url('/admin/council')}}" class="btn btn-primary">Back</a>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>


        </div>
    </div>
</div>
</div>


@endsection