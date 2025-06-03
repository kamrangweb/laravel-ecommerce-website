@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Banner Image</h4>
                        <form method="post" action="{{ route('banner.image.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $homebanner->id }}">

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

                            <input type="submit" class="btn btn-info" value="Update Image">
                        </form>
                    </div>
                </div>
            </div>
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