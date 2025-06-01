@php
    $recentProducts = App\Models\Product::orderBy('created_at', 'DESC')
        ->limit(6)
        ->get();
@endphp

@foreach($recentProducts as $product)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="product-item">
            <div class="product-thumb">
                <a href="{{ url('product/'.Str::slug($product->product_name).'-'.$product->id) }}">
                    <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name }}" class="img-fluid">
                </a>
            </div>
            <div class="product-content">
                <h4 class="title">
                    <a href="{{ url('product/'.Str::slug($product->product_name).'-'.$product->id) }}">
                        {{ $product->product_name }}
                    </a>
                </h4>
                <p>{{ Str::limit($product->short_description, 100) }}</p>
                <div class="price-section mb-3">
                    @if($product->discount_price)
                        <span class="text-decoration-line-through text-muted">${{ number_format($product->selling_price, 2) }}</span>
                        <span class="text-danger fw-bold ms-2">${{ number_format($product->discount_price, 2) }}</span>
                    @else
                        <span class="fw-bold">${{ number_format($product->selling_price, 2) }}</span>
                    @endif
                </div>
                <a href="{{ url('product/'.Str::slug($product->product_name).'-'.$product->id) }}" class="btn btn-outline-primary">
                    View Details <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach 