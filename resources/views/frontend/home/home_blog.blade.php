@php
    $posts = App\Models\Blog::latest()->take(3)->get();
@endphp

@foreach($posts as $post)
    <div class="col-lg-4 col-md-6">
        <div class="blog-item">
            <div class="blog-image">
                <img src="{{ asset($post->blog_image) }}" alt="{{ $post->blog_title }}">
                <div class="blog-date">
                    <span>{{ $post->created_at->format('d') }}</span>
                    <span>{{ $post->created_at->format('M') }}</span>
                </div>
            </div>
            <div class="blog-content">
                <h4><a href="{{ url('blog/'.$post->id.'/'.$post->blog_slug) }}">{{ $post->blog_title }}</a></h4>
                <p>{{ Str::limit($post->blog_description, 100) }}</p>
                <a href="{{ url('blog/'.$post->id.'/'.$post->blog_slug) }}" class="btn">Read More</a>
            </div>
        </div>
    </div>
@endforeach 