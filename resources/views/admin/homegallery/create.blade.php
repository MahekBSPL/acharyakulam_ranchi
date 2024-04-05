@extends('admin.layouts.master')
@section('content')
@section('title', 'Add Home Gallery')
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

                <form action="{{URL::to('admin/homegallery')}}"  method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    
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
                                    <input name="title" maxlength="36" minlength="2"   autocomplete="off" type="text" class="input_class form-control" value="{{old('title')}}" />
                                    
                                    <span class="text-danger">
                                        @error('title')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>URL:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="url" autocomplete="off" type="url" minlength="" class="input_class form-control @error('url') is-invalid @enderror" id="url" value="{{old('url')}}" />

                                    <span class="text-danger">
                                        @error('url')
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
                                        <input type="file" onchange="onlytxtuplodeimg(this);" name="image" class="input_class inline-block" id="txtimg" />
                                    </div>
                                    <span class="txtimg_error" style="color:red;"></span>
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
                                    <a href="{{ url('/admin/homegallery')}}" class="btn btn-primary">Back</a>

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
<script src="{{ URL::asset('/assets/modules/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/page/validate.js')}}"></script>
@endsection