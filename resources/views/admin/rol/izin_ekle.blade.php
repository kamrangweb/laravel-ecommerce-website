
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

						<h4 class="card-title">Izin Ekle</h4>

						<form method="post" action="{{ route('izin.ekle.form') }}"  id="myForm">
							@csrf

							<div class="row mb-3">
								<label for="example-text-input" class="col-sm-2 col-form-label">Izin Adı</label>
								<div class="col-sm-10 form-group">
									<input class="form-control" name="name" type="text" placeholder="Izin Adı">

								</div>
							</div>
							<!-- end row -->

							<div class="row mb-3">
								<label for="example-text-input" class="col-sm-2 col-form-label">Grup adi</label>
								<div class="col-sm-10 form-group">
									<select class="form-select" aria-label="Default select example" name="grup_adi">
                                        {{-- @foreach ($kategoriler as $kategori) --}}
                                        <option selected>Durum seciniz</option>
                                        <option value="banner">Banner</option>
                                        <option value="hakkimizda">Hakkimizda</option>
                                        <option value="kategoriler">Kategoriler</option>
                                        <option value="altkategoriler">Alt Kategoriler</option>
                                        <option value="urunler">Urunler</option>
                                        <option value="bloglar">bloglar</option>
                                        <option value="yazilar">bloglar icerikler</option>
                                        <option value="footer">footer</option>
                
                                        {{-- @endforeach --}}
                                        </select>
								</div>
							</div>
							

							<input type="submit" class="btn btn-info waves-effect waves-light" value="Izin Ekle">
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
<!-- kategor_ekle.blade.php **************************-->