


@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                

                <h4 class="card-title">Kategori duzenle</h4>
                <form method="post" action="{{ route('kategori.guncelle.form') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $KategoriDuzenle->id }}">
                    <input type="hidden" name="onceki_resim" value="{{ $KategoriDuzenle->resim }}">


                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Kategori adi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kategori_adi" placeholder="Kategori adi" id="example-text-input" value="{{ $KategoriDuzenle->kategori_adi }}">
                            @error('kategori_adi')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="anahtar" placeholder="Anahtar" id="example-text-input" value="{{ $KategoriDuzenle->anahtar }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Aciklama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="anahtar" placeholder="Aciklama" id="example-text-input" value="{{ $KategoriDuzenle->aciklama }}">
                        </div>
                    </div>
                  
                    
                    <!-- end row -->    

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2">Resim</label>
                        <div class="col-sm-10">
                            <input type="file" name="resim" id="resim" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{ !empty($KategoriDuzenle->resim) ? url($KategoriDuzenle->resim) : url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info " value="Kategori guncelle"> 

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