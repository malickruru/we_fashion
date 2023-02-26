<nav class="my-4">
    <ul class="btn-group">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li ><span class="btn btn-outline btn-primary rounded-none rounded-l-lg">&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline btn-primary rounded-none rounded-l-lg "  rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class=" btn btn-outline btn-primary rounded-none "><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class=" btn  rounded-none  btn-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a class=" btn btn-outline btn-primary rounded-none " href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="btn btn-outline btn-primary rounded-none rounded-r-lg " href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li ><span class=" btn btn-outline btn-primary rounded-none  rounded-r-lg" >&raquo;</span></li>
        @endif
    </ul>
</nav>
