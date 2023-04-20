@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif

        {{-- Show current items on page and total items --}}
        <li class="disabled">
            <span>
                {{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1 }} -
                {{ min($paginator->currentPage() * $paginator->perPage(), $paginator->total()) }}
                of {{ $paginator->total() }} Item
            </span>
        </li>
    </ul>
@endif
