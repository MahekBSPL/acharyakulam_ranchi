@extends('admin.layouts.master')
@section('content')
@section('title', ' Edit Competitive Exam')


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

                <form action="{{ route('competitive_exam.update', $exams->id) }}" name="EditExam" id="EditExam" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Title:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input name="title" autocomplete="off" type="text" class="input_class form-control" id="title" value="{{ !empty($exams->title)?$exams->title:old('title')}}" />
                                <span class="text-danger">@error('title'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Name:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input name="name" autocomplete="off" type="text" class="input_class form-control" id="name" value="{{ !empty($exams->name)?$exams->name:old('name')}}" />
                                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Year:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input name="year" autocomplete="off" type="text" class="input_class form-control" id="year" value="{{ !empty($exams->year)?$exams->year:old('year')}}" />
                                <span class="text-danger">@error('year'){{$message}} @enderror</span>
                            </div>
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
                                <input type="file" name="image" class="input_class inline-block" id="image" autocomplete="off" value="{{old('image')}}" />
                                @if($exams->image)
                                <a href="{{ URL::asset('/admin/upload/competitiveExam/'.$exams->image)}}"><img src="{{ URL::asset('admin/upload/competitiveExam/'.$exams->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                @endif
                                <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($exams->image)?$exams->image:old('image')}}" />
                                <span class="text-danger">@error('image'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>pdf:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="file" name="pdf" class="input_class inline-block" id="pdf" autocomplete="off" value="{{old('pdf')}}" />
                                @if($exams->pdf)

                                <a href="{{ URL::asset('/admin/upload/competitiveExam/pdf/'.$exams->pdf)}}" target="_blank"><i class="fas fa-eye"></i></a>
                                @endif
                                <input type="hidden" name="oldpdf" class="input_class w-50 inline-block" value="{{ !empty($exams->pdf)?$exams->pdf:old('pdf')}}" />
                                <span class="text-danger">@error('pdf'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xm-12">
                            <div class="pull-right">
                                <input name="submit" type="submit" class="btn btn-success" id="submit" value="Submit" />&nbsp;
                                <a href="{{URL::to('/admin/competitive_exam')}}" class="btn btn-primary">back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection