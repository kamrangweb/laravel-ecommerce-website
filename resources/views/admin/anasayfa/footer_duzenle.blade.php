


@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                

                <h4 class="card-title">Footer duzenle</h4>
                <form method="post" action="{{ route('footer.guncelle') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $footer->id }}">

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Baslik1</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="baslikbir" placeholder="Baslik" id="example-text-input" value="{{ $footer->baslikbir }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Baslik2</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="baslikiki" placeholder="Baslik" id="example-text-input" value="{{ $footer->baslikiki }}">
                        </div>
                    </div>
               
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Metin</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" type="text" name="metin" placeholder="Alt Baslik" id="elm1" rows="4">
                                {{ $footer->metin }}
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Telefon</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="telefon" placeholder="Baslik" id="example-text-input" value="{{ $footer->telefon }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">sehir</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="sehir" placeholder="Baslik" id="example-text-input" value="{{ $footer->sehir }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">adres</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="adres" placeholder="Baslik" id="example-text-input" value="{{ $footer->adres }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" placeholder="Baslik" id="example-text-input" value="{{ $footer->email }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">sosyal_baslik</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="sosyal_baslik" placeholder="Baslik" id="example-text-input" value="{{ $footer->sosyal_baslik }}">
                        </div>
                    </div>
                 
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">facebook</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="facebook" placeholder="Baslik" id="example-text-input" value="{{ $footer->facebook }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">instagram</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="instagram" placeholder="Baslik" id="example-text-input" value="{{ $footer->instagram }}">
                        </div>
                    </div>
                  
                   
                    
          

                    <input type="submit" class="btn btn-info " value="hakkimizda Guncelle"> 

                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
</div>
</div>


@endsection