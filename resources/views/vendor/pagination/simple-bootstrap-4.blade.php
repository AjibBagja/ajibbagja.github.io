@if ($paginator->hasPages())
    <nav class="navigation pagination" role="navigation">
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="page-numbers disabled" href="#" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="lnr lnr-arrow-left"></span>
                </a>
            @else
                <a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <span class="lnr lnr-arrow-left"></span></a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <span class="lnr lnr-arrow-right"></span></a>
            @else
                <a class="page-numbers disabled" aria-disabled="true" aria-label="@lang('pagination.next')" href="#" rel="next" aria-label="@lang('pagination.next')">
                    <span class="lnr lnr-arrow-right"></span></a>
            @endif
        </div>
    </nav>
@endif
