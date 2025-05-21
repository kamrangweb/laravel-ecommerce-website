@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Banners</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary btn-sm">
                            Add New Banner
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title (TR)</th>
                                    <th>Title (EN)</th>
                                    <th>Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($banners as $banner)
                                <tr>
                                    <td>{{ $banner->id }}</td>
                                    <td>{{ $banner->baslik }}</td>
                                    <td>{{ $banner->baslik_en }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @foreach($banner->images as $image)
                                            <div class="mr-2" style="width: 100px;">
                                                <img src="{{ Storage::url($image->image_path) }}" 
                                                    class="img-fluid" alt="Banner Image">
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.banners.edit', $banner) }}" 
                                            class="btn btn-info btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.banners.destroy', $banner) }}" 
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this banner?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No banners found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 