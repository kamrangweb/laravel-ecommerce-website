
<!-- admin_master.blade.php **************************-->
<!--  boş olamaz validate *--->
<script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
<!--  boş olamaz validate *--->
<!-- admin_master.blade.php **************************-->





<!-- kategor_ekle.blade.php **************************-->
@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<style>
  
        .tags-input123 {
            display: flex;
            flex-wrap: wrap;
            padding: 0;
            margin: 0;
            width: 70%;
        }

        .tags-input123 input {
            flex: 1;
            border: none;
            height: 32px;
            border: 2px solid crimson;
            border-radius: 10px;
        }

        .tags-input123 input:focus {
            border: none;
        }

        .tags-input123 ul {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 8px 0 0 0;
        }

        .tags-input123 ul li {
            margin-right: 8px;
            margin-bottom: 8px;
            padding: 8px;
            background-color: #ddd;
            border-radius: 4px;
        }

        .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: black;
}
</style>
<div class="page-content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">

						<h4 class="card-title">Urun Ekle</h4>

						<form method="post" action="{{ route('blog.icerik.ekle.form') }}"  enctype="multipart/form-data" id="myForm">
							@csrf

<div class="col-md-12">
    <div class="row">

        <div class="col-md-8">

            <div class="row mb-3">
                <label for="example-text-input" class="col-form-label">Baslik</label>
                <div class="col-sm-10 form-group">
                    <input class="form-control" name="baslik" type="text" placeholder="Baslik">
                    @error('baslik')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-form-label">Tag</label>
                <div class="col-sm-12 form-group">
                    <input class="form-control" name="tag" type="text" data-role="tagsinput" value="Etikete, deneme">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-sm-10 form-group">
                    <label for="example-text-input" class="col-form-label">Baslik</label>
                    <textarea id="elm1 " name="metin" cols="30" rows="10"></textarea>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="row mb-3">
                <label class=" col-form-label">Kategori sec</label>
                <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        <option selected>Kategori sec</option>
                        @foreach ($kategoriler as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->kategori_adi }}</option>

                        @endforeach
                        </select>
                </div>
            </div>

            
            <div class="row mb-3">
                <label for="example-text-input" class=" col-form-label">Sira no</label>
                <div class="col-sm-12 form-group">
                    <input class="form-control" name="sirano" type="number" placeholder="Sira No" value="1">
                </div>
            </div>

            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" >Resim</label>
                <div class="col-sm-12 form-group">
                    <input type="file" name="resim" id="resim" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input"></label>
                <div class="col-sm-12">
                    <img class="rounded avatar-lg" src="{{ url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                </div>
            </div>


            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class=" col-form-label">Anahtar</label>
                <div class="col-sm-12 form-group">
                    <input class="form-control" name="anahtar" type="text" placeholder="Anahtar">
                
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class=" col-form-label">Açıklama</label>
                <div class="col-sm-12 form-group">
                    <input class="form-control" name="aciklama" type="text" placeholder="Açıklama">
                </div>
            </div>
            <!-- end row -->
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Urun Ekle">
                                    
                                    
        </div>
        <!-- col-md-4 bitti -->

                                

                                
                                

                                
     </div>
</div>
					
                               
                        </form>


					</div>
				</div>
			</div> <!-- end col -->
		</div>
			</div> <!-- end col -->
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
				altkategori_id: 
				{
					required : true,
				},

				

				resim: 
				{
					required : true,
				},
				sirano: 
				{
					required : true,
				},
            }, // end rules

            messages :
            {
            	altkategori_id: 
            	{
            		required : 'Altkategori adı giriniz',
            	},

            	resim: 
            	{
            		required : 'Resim giriniz',
            	},
            	sirano: 
            	{
            		required : 'Sirano giriniz',
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
<!-- kategor_ekle.blade.php **************************-->