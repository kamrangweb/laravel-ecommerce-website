


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
                <form id="myForm" method="post" action="{{ route('alt.guncelle') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $altkategoriler->id }}">
                    <input type="hidden" name="onceki_resim" value="{{ $altkategoriler->resim }}">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kategori sec</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="kategori_id">
                                <option selected>Kategori sec</option>
                                @foreach ($kategoriler as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kategori->id == $altkategoriler->kategori_id ? 'selected' : '' }}>{{ $kategori->kategori_adi }}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Alt Kategori adi</label>
                        <div class="col-sm-10 form-group">
                            <input class="form-control" type="text" name="altkategori_adi" placeholder="Kategori adi"  value="{{ $altkategoriler->altkategori_adi }}">
                            @error('altkategori_adi')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3  form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="anahtar"  value="{{ $altkategoriler->anahtar }}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Aciklama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="aciklama" value="{{ $altkategoriler->aciklama }}">
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
                            <img class="rounded avatar-lg" src="{{ !empty($altkategoriler->resim) ? url($altkategoriler->resim) : url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info " value="Alt Kategori duzenle"> 

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

<!-- boş olamaz no refresh -->
<script type="text/javascript">
	$(document).ready(function (){
		$('#myForm').validate({
			rules: 
			{
				altkategori_adi: 
				{
					required : true,
				},

				anahtar: 
				{
					required : true,
				},

				aciklama: 
				{
					required : true,
				},

				
            }, // end rules

            messages :
            {
            	altkategori_adi: 
            	{
            		required : 'Alt Kategori adı giriniz',
            	},

            	anahtar: 
            	{
            		required : 'Anahtar giriniz',
            	},

            	aciklama: 
            	{
            		required : 'Açıklama giriniz',
            	},

            	
            }, // end message 

            errorElement : 'span',
            errorPlacement: function (error,element) {
            	error.addClass('invalid-feedback');
            	element.closest('.form-group').append(error);
            },

            highlight : function(element, errorClass, validClass){
            	$(element).addClass('is-invalid');
            },

            unhighlight : function(element, errorClass, validClass){
            	$(element).removeClass('is-invalid');
            },
        });
	});
</script>
<!-- boş olamaz no refresh -->

@endsection