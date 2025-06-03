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

						<h4 class="card-title">Edit Product</h4>

						<form method="post" action="{{ route('product.update') }}" enctype="multipart/form-data" id="myForm">
							@csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="old_image" value="{{ $product->product_thumbnail }}">
        
<div class="col-md-12">
    <div class="row">

        <div class="col-md-8">

            <div class="row mb-3">
                <label for="example-text-input" class="col-form-label">Product Name</label>
                <div class="col-sm-10 form-group">
                    <input class="form-control" name="product_name" type="text" placeholder="Product Name" value="{{ $product->product_name }}">
                    @error('product_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <!-- <label for="example-text-input" class="col-form-label">Short Description</label>
                <div class="col-sm-12 form-group">
                    <textarea class="form-control" name="short_description" rows="3" placeholder="Short Description">{{ $product->short_description }}</textarea>
                </div> -->
            </div>
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-form-label">Selling Price</label>
                <div class="col-sm-10 form-group">
                    <input class="form-control" name="selling_price" type="number" step="0.01" placeholder="Selling Price" value="{{ $product->selling_price }}">
                    @error('selling_price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-form-label">Discount Price</label>
                <div class="col-sm-10 form-group">
                    <input class="form-control" name="discount_price" type="number" step="0.01" placeholder="Discount Price" value="{{ $product->discount_price }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-form-label">SKU</label>
                <div class="col-sm-10 form-group">
                    <input class="form-control" name="sku" type="text" placeholder="SKU" value="{{ $product->product_sku }}">
                    @error('sku')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-form-label">Stock</label>
                <div class="col-sm-10 form-group">
                    <input class="form-control" name="stock" type="number" placeholder="Stock" value="{{ $product->product_stock_quantity }}">
                    @error('stock')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="row mb-3">
                <label for="example-text-input">Product Image</label>
                <div class="col-sm-12 form-group">
                    <input type="file" name="product_thumbnail" id="product_thumbnail" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input"></label>
                <div class="col-sm-12">
                    <img class="rounded avatar-lg" src="{{ !empty($product->product_thumbnail) ? url($product->product_thumbnail) : url('upload/resim-yok.png') }}" alt="" id="product_thumbnail_preview">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-form-label">Status</label>
                <div class="col-sm-12 form-group">
                    <select class="form-select" name="status">
                        <option value="1" {{ $product->status ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Product">
        </div>
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

<script>
        
    
    $(document).ready(function() {
    // alert('test');
    $('select[name="kategori_id"]').on('change', function() {
        var kategori_id = $(this).val();
        if (kategori_id) {
            $.ajax({
                url: "{{ url('/altkategoriler/ajax') }}/" + kategori_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // Önce altkategori selectbox'ını temizliyoruz
                    $('select[name="altkategori_id"]').empty();

                    // Gelen verilerle dolduruyoruz
                    $.each(data, function(key, value) {
                        $('select[name="altkategori_id"]').append(
                            '<option value="' + value.id + '">' + value.altkategori_adi + '</option>'
                        );
                    });
                },
                error: function() {
                    alert('Alt kategoriler yüklenirken bir hata oluştu.');
                }
            });
            // alert('danger1');
        } else {
            alert('danger');
        }
    });
    });

</script>




@endsection
<!-- kategor_ekle.blade.php **************************-->