@php
    $categories = App\Models\Category::with('subcategories')->get();
@endphp

@foreach($categories as $category)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="category-item">
            <div class="category-thumb">
                <a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}">
                    <img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}">
                </a>
            </div>
            <div class="category-content">
                <h4 class="title">
                    <a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}">
                        {{ $category->category_name }}
                    </a>
                </h4>
                <p>{{ $category->subcategories->count() }} Subcategories</p>
                <a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}" class="btn btn-outline-primary">
                    View Details <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach 