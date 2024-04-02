@extends('admin.layouts.master')
@section('content')
@section('title', 'Edit Slider')

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

                <form action="{{ route('winner.update' , $winner->id) }}" name="form1" id="form1" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('PUT')
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
                                <input type="file"  onchange="onlytxtuplodeimg(this);"  id="txtimg"name="image" class="input_class inline-block"  autocomplete="off" value="{{old('image')}}" />
                                @if($winner->image)
                                <a href="{{ URL::asset('/admin/upload/winner/'.$winner->image)}}"><img src="{{ URL::asset('admin/upload/winner/'.$winner->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                @endif
                                <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($winner->image)?$winner->image:old('image')}}" />
                                <span class="text-danger">@error('image'){{$message}} @enderror</span>
                                <span class="txtimg_error" style="color:red;"></span>
                            </div>
                        </div>
                    </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">

                                    <input name="submit" type="submit" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                                    <a href="{{ url('/admin/winner')}}" class="btn btn-primary">Back</a>
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