@extends('admin.layouts.master')
@section('content')
@section('title', 'Edit Prospectus')

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

                <form action="{{ route('prospectus.update' , $data->id) }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
                                    <input name="title" maxlength="36" minlength="2" autocomplete="off" type="text" class="input_class form-control  @error('title') is-invalid @enderror" id="title" value="{{ !empty($data->title)?$data->title:old('title')}}" />
                                 
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
                                        <label>PDF:</label>
                                        <span class="star">*</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="file" value="{{old('pdf')}}" name="pdf" class="input_class w-50 inline-block" id="txtuplode" onchange="onlytxtuplodepdf(this);"  />
                                        <a href="{{ URL::asset('/public/admin/upload/prospectus/pdf/'.$data->pdf)}}" target=_blank>View PDF</a>
                                        <input type="hidden" name="oldpdf" class="input_class w-50 inline-block" value="<?php echo !empty($data->pdf) ? $data->pdf : ''; ?>" />
                                        <span class="invalid-feedback" role="alert">
                                            @error('image')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </span>
                                    </div>
                                    <span class="txtuplode_error" style="color:red;"></span>
                                </div>
                            </div>
                        

                        <div id="txtPDF">
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Image:</label>
                                        <span class="star">*</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="file"   value="{{old('image')}}" name="image" class="input_class w-50 inline-block" id="txtimg" onchange="onlytxtuplodeimg(this);" />
                                        <a href="{{ URL::asset('/public/admin/upload/prospectus/image/'.$data->image)}}"><img src="{{ URL::asset('/public/admin/upload/prospectus/image/'.$data->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                        <input type="hidden" name="olduplode" class="input_class w-50 inline-block" value="<?php echo !empty($data->image) ? $data->image : ''; ?>" />
                                       
                                        <span class="invalid-feedback" role="alert">
                                            @error('image')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </span>

                                    </div>
                                    <span class="txtimg_error" style="color:red;"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">

                                    <input name="cmdsubmit" type="submit" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                                    <a href="{{ url('/admin/prospectus')}}" class="btn btn-primary">Back</a>
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
<script src="{{ URL::asset('/assets/modules/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/page/validate.js')}}"></script>
@endsection