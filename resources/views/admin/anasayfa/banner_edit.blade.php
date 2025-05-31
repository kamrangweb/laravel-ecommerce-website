@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Banner</h4>
                <form method="post" action="{{ route('banner.home.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $homebanner->id }}">

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="baslik" placeholder="Title" id="example-text-input" value="{{ $homebanner->baslik }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Subtitle</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="alt_baslik" placeholder="Subtitle" id="example-text-input" value="{{ $homebanner->alt_baslik }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">URL</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="url" name="url" placeholder="URL" id="example-text-input" value="{{ $homebanner->url }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="url" name="video_url" placeholder="Video URL" id="example-text-input" value="{{ $homebanner->video_url }}">
                        </div>
                    </div>
                    
                    <!-- end row -->    

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="resim" id="resim" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{ (!empty($homebanner->resim)) ? url($homebanner->resim): url('upload/no-image.png') }}" alt="" id="resimGoster">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info" value="Update"> 

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