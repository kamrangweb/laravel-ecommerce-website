
<!-- admin_master.blade.php **************************-->
<!--  boş olamaz validate *--->
<script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
<!--  boş olamaz validate *--->
<!-- admin_master.blade.php **************************-->





<!-- kategor_ekle.blade.php **************************-->
@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">

						<h4 class="card-title">Coklu Ekle</h4>

						<form method="post" action="{{ route('coklu.resim.form') }}"  enctype="multipart/form-data" id="myForm">
							@csrf

						

							<!-- end row -->
							<div class="row mb-3">
								<label for="example-text-input" class="col-sm-2">Resim</label>
								<div class="col-sm-10 form-group">
									<input type="file" name="resim[]" id="resim" class="form-control" multiple>
								</div>
							</div>

							<div class="row mb-3">
								<label for="example-text-input" class="col-sm-2"></label>
								<div class="col-sm-10">
									<img class="rounded avatar-lg" src="{{ url('upload/resim-yok.png') }}" alt="" id="resimGoster">
								</div>
							</div>

							<input type="submit" class="btn btn-info waves-effect waves-light" value="Coklu Resim Ekle">
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


				resim: 
				{
					required : true,
				},
            }, // end rules

            messages :
            {
            	
            	resim: 
            	{
            		required : 'Resim giriniz',
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