@if ($paginator->hasPages())
    <div class="pager tertiary">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <div class="pager-item"><p><a class="btn btn-outline-secondary btn-sm"
                                          href="{{ $paginator->previousPageUrl() }}"> @lang('corals-marketplace-dragon::labels.partial.previous')</a>
                </p></div>
        @endif
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li>{{ $element }}</li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="pager-item active"><p>{{ $page }}</p></div>
                    @else
                        <div class="pager-item"><a href="{{ $url }}"><p>{{ $page }}</p></a></div>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="pager-item"><p><a
                            href="{{ $paginator->nextPageUrl() }}">@lang('corals-marketplace-dragon::labels.partial.next')</a>
                </p></div>
        @endif
    </div>
@endif
