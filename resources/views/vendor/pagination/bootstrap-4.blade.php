@if ($paginator->hasPages())
    <nav class="navigation pagination" role="navigation">
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="prev page-numbers disabled" aria-disabled="true" href="#" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="lnr lnr-arrow-left"></span>
                </a>
            @else
                <a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <span class="lnr lnr-arrow-left"></span></a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="page-numbers disabled">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="page-numbers disabled" href="#" aria-disabled="true">
                                <span>{{ $page }}</span>
                            </a>
                        @else
                            <a class="page-numbers" href="{{ $url }}">{{$page}}</a>
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
