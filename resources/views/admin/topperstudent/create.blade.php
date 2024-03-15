@extends('admin.layouts.master')
@section('content')
@section('title', 'Add Topper Student')
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
                <form action="{{URL::to('admin/topperstudent/')}}"  method="post" enctype="multipart/form-data" accept-charset="utf-8">   
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
                                    <input name="title"  minlength="2"  autocomplete="off" type="text" class="input_class form-control" id="title" value="{{old('title')}}" />
                                        @if($errors->has('title'))
                                          <p class="text-danger">{{ $errors->first('title') }}</p>
                                        @endif 
                                </div>
                            </div>
</div>
                        <div id="txtPDF" >
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>PDF:</label>
                                        <span class="star">*</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="file"  name="pdf"
                                            class="input_class inline-block" id="txtuplode"  onchange="onlytxtuplodepdf(this)"required />
                                    </div>
                                    <span class="txtuplode_error" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                        <div id="txtPDF" >
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Image:</label>
                                        <span class="star"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="file" required accept="image/png, image/gif, image/jpeg, image/jpg"  onchange="onlytxtuplodeimg(this)" name="images[]"
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
                                    <a href="{{ url('/admin/topperstudent')}}" class="btn btn-primary">Back</a>

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