
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

						<h4 class="card-title">Role Yetki Duzenle</h4>

						<form method="post" action="{{ route('rol.yetki.guncelle',$rol->id) }}"  id="myForm">
							@csrf

                            <div class="row mb-3">
								<label for="example-text-input" class="col-sm-2 col-form-label">Rol adi</label>
								<div class="col-sm-10 form-group">
                                    <input type="text" name="name" value="{{ $rol->name }}">
								</div>
							</div>
							
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="formCheck1hepsi">
                                <label class="form-check-label" for="formCheck1hepsi">
                                    Tam Yetki
                                </label>
                            </div>

                            @foreach ($izin_gruplari as $grup)
                                

							<div class="row mb-3">
								<div class="col-3">
                                    @php
                                        $yetkigrup= App\Models\User::YetkiGruplari($grup->grup_adi);
                                    @endphp
                                                

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheck1"
                                        {{ App\Models\User::RolYetkileri($rol,$yetkigrup) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="formCheck1">
                                            <h5>{{ $grup->grup_adi }}</h5>
                                        </label>
                                    </div>
                                </div>

           		                <div class="col-9">

                                    @foreach ($yetkigrup as $izin)
                                        
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox"
                                        name="yetki[]" {{ $rol->hasPermissionTo($izin->name) ? 'checked' : '' }} id="formCheck1{{ $izin->id }}" value="{{ $izin->id }}">
                                        <label class="form-check-label" for="formCheck1{{ $izin->id }}">
                                            {{ $izin->name }}
                                        </label>
                                    </div>

                                    @endforeach

                                </div>
							</div>
                            @endforeach

                            
							<!-- end row -->

							

							<input type="submit" class="btn btn-info waves-effect waves-light" value="Role Yetki Duzenle">
						</form>


					</div>
				</div>
			</div> <!-- end col -->
		</div>

	</div>
</div>
<script>
    $('#formCheck1hepsi').click(function(){
        if($(this).is(':checked')){
            $('input[type=checkbox]').prop('checked',true);
        }else{
            $('input[type=checkbox]').prop('checked',false);
        }
    });
</script>
@endsection
<!-- kategor_ekle.blade.php **************************-->