@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Banner</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="baslik">Title (TR)</label>
                            <input type="text" class="form-control @error('baslik') is-invalid @enderror" 
                                id="baslik" name="baslik" value="{{ old('baslik', $banner->baslik) }}" required>
                            @error('baslik')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alt_baslik">Subtitle (TR)</label>
                            <input type="text" class="form-control @error('alt_baslik') is-invalid @enderror" 
                                id="alt_baslik" name="alt_baslik" value="{{ old('alt_baslik', $banner->alt_baslik) }}">
                            @error('alt_baslik')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="baslik_en">Title (EN)</label>
                            <input type="text" class="form-control @error('baslik_en') is-invalid @enderror" 
                                id="baslik_en" name="baslik_en" value="{{ old('baslik_en', $banner->baslik_en) }}">
                            @error('baslik_en')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alt_baslik_en">Subtitle (EN)</label>
                            <input type="text" class="form-control @error('alt_baslik_en') is-invalid @enderror" 
                                id="alt_baslik_en" name="alt_baslik_en" value="{{ old('alt_baslik_en', $banner->alt_baslik_en) }}">
                            @error('alt_baslik_en')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <h4 class="mt-4">Existing Images</h4>
                        <div class="row">
                            @foreach($banner->images as $image)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img src="{{ Storage::url($image->image_path) }}" class="card-img-top" alt="Banner Image">
                                    <div class="card-body">
                                        <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                                        
                                        <div class="form-group">
                                            <label>Image Title</label>
                                            <input type="text" class="form-control" name="titles[]" 
                                                value="{{ old('titles.'.$loop->index, $image->title) }}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Image Subtitle</label>
                                            <input type="text" class="form-control" name="subtitles[]" 
                                                value="{{ old('subtitles.'.$loop->index, $image->subtitle) }}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Order</label>
                                            <input type="number" class="form-control" name="orders[]" 
                                                value="{{ old('orders.'.$loop->index, $image->order) }}" min="0">
                                        </div>

                                        <form action="{{ route('admin.banners.images.destroy', $image) }}" 
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this image?')">
                                                Delete Image
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <h4 class="mt-4">Add New Images</h4>
                        <div id="new-images-container">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="images[]" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="new_titles[]">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <input type="text" class="form-control" name="new_subtitles[]">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-info mb-3" onclick="addNewImageFields()">
                            Add Another Image
                        </button>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Banner</button>
                            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function addNewImageFields() {
    const container = document.getElementById('new-images-container');
    const newRow = document.createElement('div');
    newRow.className = 'row mb-3';
    newRow.innerHTML = `
        <div class="col-md-4">
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="images[]" accept="image/*">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="new_titles[]">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Subtitle</label>
                <input type="text" class="form-control" name="new_subtitles[]">
            </div>
        </div>
    `;
    container.appendChild(newRow);
}
</script>
@endpush
@endsection 