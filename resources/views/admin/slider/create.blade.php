@extends('admin.layouts.master')
@section('content')
@section('title', 'Add Slider')
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

                <form name="form1" id="form1" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Slider Title:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="title" maxlength="36" minlength="2" autocomplete="off" type="text" class="input_class form-control" id="title" value="{{old('title')}}" />
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
                                    <!-- <span class="star">*</span> -->
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
                                        <input type="file" onchange="onlytxtuplodeimg(this);" name="image" class="input_class inline-block" id="image" />
                                    </div>
                                    <!-- <span class="image_error" style="color:red;"></span> -->
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
                                    <a href="{{ url('/admin/slider')}}" class="btn btn-primary">Back</a>

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

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#cmdsubmit').click(function(e) {
            e.preventDefault();

            // Retrieve CSRF token value from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var formData = new FormData();
            formData.append('title', $('#title').val());
            formData.append('url', $('#url').val());
            formData.append('image', $('#image').prop('files')[0]);

            // var file_data = $('#image').prop('files')[0];
            //var exten = $("#image").val().split('.').pop().toLowerCase();

            $.ajax({
                url: "{{URL::to('/admin/slider')}}",
                type: "post",
                datatype: "json",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                // success: function(response){
                //     $('#form1')[0].reset();
                //     console.log(formData);
                //     console.log(response);
                success: function(response) {
                    if (response.success) {
                        // Success: Display success message
                        console.log(response.message);

                        // Redirect to another page (if needed)
                        window.location.href = '/admin/slider';
                    }
                }

            });
        });
    });
</script>
@endsection