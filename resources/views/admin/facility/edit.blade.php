@extends('admin.layouts.master')
@section('content')
@section('title', 'Edit Facility')

<script>
    function handleSelectChange(select) {
        if (select.value === '1') {
            document.getElementById('descriptionBlock').style.display = "block";
            document.getElementById('urlBlock').style.display = "none";
        } else if (select.value === '2') {
            document.getElementById('descriptionBlock').style.display = "none";
            document.getElementById('urlBlock').style.display = "block";
        } else {
            document.getElementById('ContentBlock').style.display = "none";
            document.getElementById('urlBlock').style.display = "none";
        }
    }
</script>

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

                <form action="{{ route('facility.update', $facilitys->id) }}" name="EditFacility" id="EditFacility" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
                                <input name="title" minlength="2" autocomplete="off" type="text" class="input_class form-control" id="title" value="{{ !empty($facilitys->title)?$facilitys->title:old('title')}}"  />
                                <span class="text-danger"> @error('title'){{$message}} @enderror</span>
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
                                <input type="file" name="image" class="input_class inline-block" id="image" autocomplete="off" value="{{ old('image') }}" />

                                @if($facilitys->image)
                                <a href="{{ URL::asset('/public/admin/upload/facility/'.$facilitys->image)}}"><img src="{{ URL::asset('public/admin/upload/facility/'.$facilitys->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                @endif
                                <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($facilitys->image)?$facilitys->image:old('image')}}" />
                                <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Type:</label>
                                <span class="star">*</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <select name="type" class="input_class form-control" id="type" autocomplete="off" onchange="handleSelectChange(this)">
                                    <option value="" selected="" disabled=""> Select </option>
                                    <?php $typeArray = ["1" => "Description", "2" => "Url"]; ?>
                                    @foreach ($typeArray as $key => $value)
                                    <option value="{{ $key }}"  @if(old('type', $facilitys->type) == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('type'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="" id="descriptionBlock" style="display: none;">
                    <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <textarea name="description" id="description" class="form-control summernote-simple " rows="3" aria-hidden="true" style="display: none;"><?php echo !empty($facilitys->description) ? $facilitys->description : old('description'); ?></textarea>
                                    <span class="text-danger">@error('description'){{$message}} @enderror</span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="" id="urlBlock" style="display:none;">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Url:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="url" minlength="2" autocomplete="off" type="string" class="input_class form-control" id="url" value="{{ !empty($facilitys->url)?$facilitys->url:old('url')}}" />
                                    <span class="text-danger"> @error('url'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xm-12">
                            <div class="pull-right">
                                <input name="submit" type="submit" class="btn btn-success" id="submit" value="Submit" />&nbsp;
                                <a href="{{URL::to('/admin/facility')}}" class="btn btn-primary">back</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var oldtype = "{{ old('type',$facilitys->type) }}";
        document.getElementById('descriptionBlock').style.display = 'none';
        document.getElementById('urlBlock').style.display = 'none';

        if (oldtype == '1') {
            document.getElementById('descriptionBlock').style.display = 'block';
            document.getElementById('urlBlock').style.display = 'none';
        } else if (oldtype == '2') {
            document.getElementById('descriptionBlock').style.display = 'none';
            document.getElementById('urlBlock').style.display = 'block';
        } else {
            document.getElementById('descriptionBlock').style.display = 'none';
            document.getElementById('urlBlock').style.display = 'none';
        }
    });
</script>

@endsection