


@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                

                <h4 class="card-title">Izin duzenle</h4>
                <form method="post" action="{{ route('izin.guncelle.form') }}" class="mt-6 space-y-6" id="myForm">
                    @csrf

                    <input type="hidden" name="id" value="{{ $izinler->id }}">


                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Izin adi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" placeholder="Izin adi" id="example-text-input" value="{{ $izinler->name }}">
                
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Grup adi</label>
                        <div class="col-sm-10 form-group">
                            <select class="form-select" aria-label="Default select example" name="grup_adi">
                                {{-- @foreach ($kategoriler as $kategori) --}}
                                <option selected>Durum seciniz</option>
                                <option value="banner" {{ $izinler->grup_adi == 'banner' ? 'selected': '' }}>Banner</option>
                                <option value="hakkimizda" {{ $izinler->grup_adi == 'hakkimizda' ? 'selected': '' }}>Hakkimizda</option>
                                <option value="kategoriler" {{ $izinler->grup_adi == 'kategoriler' ? 'selected': '' }}>Kategoriler</option>
                                <option value="altkategoriler" {{ $izinler->grup_adi == 'altkategoriler' ? 'selected': '' }}>Alt Kategoriler</option>
                                <option value="urunler" {{ $izinler->grup_adi == 'urunler' ? 'selected': '' }}>Urunler</option>
                                <option value="bloglar" {{ $izinler->grup_adi == 'bloglar' ? 'selected': '' }}>bloglar</option>
                                <option value="yazilar"{{ $izinler->grup_adi == 'yazilar' ? 'selected': '' }}>bloglar icerikler</option>
                                <option value="footer" {{ $izinler->grup_adi == 'footer' ? 'selected': '' }}>footer</option>
        
                                {{-- @endforeach --}}
                                </select>
                        </div>
                    </div>
                  
             
                  
        

                    <input type="submit" class="btn btn-info " value="Izin guncelle"> 

                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
</div>
</div>


<!-- boş olamaz no refresh -->
<script type="text/javascript">
	$(document).ready(function (){
		$('#myForm').validate({
			rules: 
			{
				name: 
				{
					required : true,
				},


            }, // end rules

            messages :
            {
            	name: 
            	{
            		required : 'Izin adı giriniz',
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