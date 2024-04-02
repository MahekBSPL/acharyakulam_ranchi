@extends('admin.layouts.master')
@section('content')
@section('title', 'Add Winner')
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

                <form action="{{URL::to('admin/winner')}}" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="panel-body">
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
                                <input type="file" onchange="onlytxtuplodeimg(this);"  id="txtimg" name="image" class="input_class inline-block"  autocomplete="off" value="{{old('image')}}" required />
                                <span class="txtimg_error" style="color:red;"></span>
                                <span class="text-danger">@error('image'){{$message}} @enderror</span>
                                   
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">
                                <input name="submit" type="submit" class="btn btn-success" id="submit" value="Submit" />&nbsp;
                                <a href="{{URL::to('/admin/winner')}}" class="btn btn-primary">back</a>
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