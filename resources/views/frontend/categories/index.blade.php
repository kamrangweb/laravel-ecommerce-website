@extends('frontend.main_master')

@section('main')
<div class="container py-5">
    <h1 class="text-center mb-5">Browse Categories</h1>
    
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($category->kategori_resim)
                        <img src="{{ asset($category->kategori_resim) }}" class="card-img-top" alt="{{ $category->kategori_adi }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->kategori_adi }}</h5>
                        @if($category->subcategories->count() > 0)
                            <p class="card-text">
                                <strong>Subcategories:</strong>
                            </p>
                            <ul class="list-unstyled">
                                @foreach($category->subcategories as $subcategory)
                                    <li>
                                        <a href="{{ route('subcategory.detail', ['id' => $subcategory->id, 'url' => $subcategory->altkategori_slug]) }}" class="text-decoration-none">
                                            {{ $subcategory->altkategori_adi }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <a href="{{ route('category.detail', ['id' => $category->id, 'url' => $category->kategori_slug]) }}" class="btn btn-primary mt-3">View Products</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 