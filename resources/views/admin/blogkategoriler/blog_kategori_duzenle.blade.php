


@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                

                <h4 class="card-title">Blog Kategori duzenle</h4>
                <form method="post" action="{{ route('blog.kategori.guncelle') }}" class="mt-6 space-y-6" >
                    @csrf

                    <input type="hidden" name="id" value="{{ $BlogKategoriDuzenle->id }}">


                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Kategori adi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kategori_adi" placeholder="Kategori adi" id="example-text-input" value="{{ $BlogKategoriDuzenle->kategori_adi }}">
                            @error('kategori_adi')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class=" col-form-label">Sira no</label>
                        <div class="col-sm-12 form-group">
                            <input class="form-control" name="sirano" type="number" placeholder="Sira No" value="{{ $BlogKategoriDuzenle->sirano }}">
                        </div>
                    </div>
        
                  
                  
                    
             

                    <input type="submit" class="btn btn-info " value="BlogKategori guncelle"> 

                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
</div>
</div>



@endsection