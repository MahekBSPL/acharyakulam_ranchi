@extends('admin.layouts.master')
@section('content')
@section('title', 'Edit Event')

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

                <form action="{{ route('event.update' , $events->id) }}" name="form1" id="form1" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('PUT')
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Title:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="title"  autocomplete="off" type="text" class="input_class form-control  @error('title') is-invalid @enderror" id="title" value="{{ !empty($events->title)?$events->title:old('title')}}" />
                                 
                                    <span class="invalid-feedback" role="alert">
                                    @error('title')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Sub Title:</label>
                                    
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="sub_title"  autocomplete="off" type="text" class="input_class form-control  @error('sub_title') is-invalid @enderror" id="sub_title" value="{{ !empty($events->sub_title)?$events->sub_title:old('sub_title')}}" />
                                 
                                    <span class="invalid-feedback" role="alert">
                                    @error('title')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Date:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="date" autocomplete="off" type="text" class="input_class form-control  @error('date') is-invalid @enderror" id="title" value="{{ !empty($events->date)?$events->date:old('date')}}" />
                                 
                                    <span class="invalid-feedback" role="alert">
                                    @error('date')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Location:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="location"  autocomplete="off" type="text" class="input_class form-control  @error('location') is-invalid @enderror" id="location" value="{{ !empty($events->location)?$events->location:old('location')}}" />
                                 
                                    <span class="invalid-feedback" role="alert">
                                    @error('location')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                  
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
                                    <textarea name="description" id="description" class="form-control summernote-simple " rows="3" aria-hidden="true" style="display: none;">{{ !empty($events->description)?$events->description:old('description')}}</textarea>
                                    <span class="text-danger">@error('description'){{$message}} @enderror</span>
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
                                        <input type="file"  onchange="onlytxtuplodeimg(this);" value="{{old('image')}}" name="image" class="input_class w-50 inline-block" id="txtimg" />
                                        <a href="{{ URL::asset('/public/admin/upload/event/'.$events->image)}}"><img src="{{ URL::asset('public/admin/upload/event/'.$events->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                        <input type="hidden" name="olduplode" class="input_class w-50 inline-block" value="<?php echo !empty($events->image) ? $events->image : ''; ?>" />
                                        <span class="txtimg_error" style="color:red;"></span>
                                        <span class="invalid-feedback" role="alert">
                                            @error('image')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">

                                    <input name="cmdsubmit" type="submit" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                                    <a href="{{ url('/admin/event')}}" class="btn btn-primary">Back</a>
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
<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/public/assets/js/page/validate.js')}}"></script>
@endsection