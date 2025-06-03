<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<section>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Profile Image</h4>
            
            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="row mb-3">
                    <label for="resim" class="col-sm-2 col-form-label">Profile Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="resim" id="resim" class="form-control">
                        @error('resim')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Current Image</label>
                    <div class="col-sm-10">
                        <img class="rounded avatar-lg" src="{{ (!empty(Auth::user()->resim)) ? url('upload/admin/'.Auth::user()->resim): url('upload/resim-yok.png') }}" alt="Profile Image" id="resimGoster">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Update Image</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

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