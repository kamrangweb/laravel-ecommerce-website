@extends('frontend.main_master')

@section('main')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar with categories -->
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Categories</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        @foreach($categories as $category)
                            <li class="mb-2">
                                <a href="{{ route('category.detail', ['id' => $category->id, 'url' => $category->kategori_slug]) }}" class="text-decoration-none">
                                    {{ $category->kategori_adi }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Products grid -->
        <div class="col-lg-9">
            <div class="row">
                @foreach($products->where('product_status', true) as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset($product->urun_resim) }}" class="card-img-top" alt="{{ $product->urun_adi }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->urun_adi }}</h5>
                                <p class="card-text">{{ Str::limit($product->urun_aciklama, 100) }}</p>
                                <a href="{{ route('product.detail', ['id' => $product->id, 'url' => $product->urun_slug]) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 