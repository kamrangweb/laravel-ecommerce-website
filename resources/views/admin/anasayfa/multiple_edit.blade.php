@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                

                <h4 class="card-title">Coklu resim  duzenle</h4>
                <form method="post" action="{{ route('coklu.guncelle') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $resim->id }}">
                    <input type="hidden" name="onceki_resim" value="{{ $resim->resim }}">


                    
                  
                    
                    <!-- end row -->    

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2">Resim</label>
                        <div class="col-sm-10">
                            <input type="file" name="resim" id="resim" class="form-control">
                            @error('resim')
                            <span>{{ $message }}</span>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{ asset($resim->resim) }}" alt="" id="resimGoster">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info " value="Coklu guncelle"> 

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