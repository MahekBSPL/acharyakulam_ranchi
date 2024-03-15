@extends('admin.layouts.master')
@section('content')
@section('title', 'Edit Facility Slider')

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

                <form action="{{ route('facilityslider.update', $facilitys->id) }}" name="EditFacilitySlider" id="EditFacilitySlider" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('PUT')

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
                                @if($facilitys->image)
                                <a href="{{ URL::asset('/admin/upload/facilitySlider/'.$facilitys->image)}}"><img src="{{ URL::asset('admin/upload/facilitySlider/'.$facilitys->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                @endif
                                <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($facilitys->image)?$facilitys->image:old('image')}}" />
                                <span class="text-danger">@error('image'){{$message}} @enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">
                                    <input name="submit" type="submit" class="btn btn-success" id="submit" value="Submit" />&nbsp;
                                    <a href="{{URL::to('/admin/facilityslider')}}" class="btn btn-primary">back</a>
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