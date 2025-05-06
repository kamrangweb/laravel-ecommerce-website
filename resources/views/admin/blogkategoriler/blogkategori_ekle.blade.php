
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

<div class="page-content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">

						<h4 class="card-title">Kategori Ekle</h4>

						<form method="post" action="{{ route('blog.kategori.form') }}"  enctype="multipart/form-data" id="myForm">
							@csrf



            <div class="row mb-3">
                <label for="example-text-input" class="col-form-label">Kategori adi</label>
                <div class="col-sm-10 form-group">
                    <input class="form-control" name="kategori_adi" type="text" placeholder="Baslik">
                    @error('kategori_adi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
       

            

            <div class="row mb-3">
                <label for="example-text-input" class=" col-form-label">Sira no</label>
                <div class="col-sm-12 form-group">
                    <input class="form-control" name="sirano" type="number" placeholder="Sira No" value="1">
                </div>
            </div>


            <!-- end row -->
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Urun Ekle">
                                    
                                    
        <!-- col-md-4 bitti -->

                                

                                
                                

			
                               
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
				kategori_adi: 
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
            	kategori_adi: 
            	{
            		required : 'Altkategori adı giriniz',
            	},

            	sirano: 
            	{
            		required : 'sirano giriniz',
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