@if ($paginator->hasPages())

<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
            <a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a>

                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="far fa-long-arrow-left"></a>
                </li>
            @endif

            
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

             {{-- Next Page Link --}}
             @if ($paginator->hasMorePages())
             <li  class="page-item">
                 <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="far fa-long-arrow-right"></i</a>
             </li>
         @else
             <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a>

             </li>
         @endif

        {{-- <li class="page-item">
            <a class="page-link" href="#"></i></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">...</a></li>


        <li class="page-item">
            <a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a></li> --}}
    </ul>
</nav>

@endif
