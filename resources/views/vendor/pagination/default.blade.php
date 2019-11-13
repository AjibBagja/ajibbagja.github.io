@if ($paginator->hasPages())
    <nav class="navigation pagination" role="navigation">
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="prev page-numbers disabled" href="#" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="lnr lnr-arrow-left"></span>
                </a>
            @else
                <a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <span class="lnr lnr-arrow-right"></span></a>
            @else
                <a class="next page-numbers disabled" aria-disabled="true" aria-label="@lang('pagination.next')" href="#" rel="next" aria-label="@lang('pagination.next')">
                    <span class="lnr lnr-arrow-right"></span></a>
            @endif
        </div>
    </nav>
@endif
