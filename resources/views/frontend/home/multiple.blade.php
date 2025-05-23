@php
    $categories = App\Models\Category::with('subcategories')->get();
@endphp

@foreach($categories as $category)
    <div class="col-lg-4 col-md-6">
        <div class="portfolio-item">
            <div class="portfolio-image">
                <img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}">
                <div class="portfolio-overlay">
                    <div class="portfolio-content">
                        <h4><a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}</a></h4>
                        <p>{{ $category->subcategories->count() }} Subcategories</p>
                        <a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}" class="btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach 