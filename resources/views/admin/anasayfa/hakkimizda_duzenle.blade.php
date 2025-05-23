@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                

                <h4 class="card-title">About Edit</h4>
                <form method="post" action="{{ route('about.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $about->id }}">
                    <input type="hidden" name="old_image" value="{{ $about->about_image }}">

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" placeholder="Title" id="example-text-input" value="{{ $about->title }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="short_title" placeholder="Short Title" id="example-text-input" value="{{ $about->short_title }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_description" rows="3">{{ $about->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="long_description" rows="5">{{ $about->long_description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="about_image" id="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{ (!empty($about->about_image))? url($about->about_image): url('upload/no_image.jpg') }}" alt="About Image">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update About">
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#resim').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#resimGoster').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection