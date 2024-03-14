@extends('admin.layouts.master')
@section('content')
@section('title', 'Add Prospectus')
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

                <form action="{{URL::to('admin/prospectus/')}}"  method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
                                    <input name="title" autocomplete="off" type="text" minlength="" class="input_class form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}" />
                                    </div>
                                    <span class="text-danger">
                                        @error('title')
                                        {{$message}}
                                        @enderror
                                    </span>
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
                                        <input type="file" onchange="onlytxtuplodepdf(this);" name="pdf" class="input_class inline-block" id="txtuplode" />
                                    </div>
                                    <span class="txtuplode_error" style="color:red;"></span>
                                    <span class="text-danger">
                                        @error('pdf')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Image:</label>
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
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">
                                    <input name="cmdsubmit" type="submit" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                                    <a href="{{ url('/admin/prospectus')}}" class="btn btn-primary">Back</a>

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