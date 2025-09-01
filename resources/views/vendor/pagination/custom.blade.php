@if ($paginator->hasPages())
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <div style="color: var(--text-secondary); font-size: 14px;">
            Showing 
            {{ $paginator->firstItem() }} 
            to 
            {{ $paginator->lastItem() }} 
            of 
            {{ $paginator->total() }} 
            entries
        </div>

        <div style="display: flex; gap: 10px;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="action-btn" disabled>Previous</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="action-btn">Previous</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="action-btn" disabled>{{ $element }}</button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="action-btn" style="background: var(--accent); color: white;">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="action-btn">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="action-btn">Next</a>
            @else
                <button class="action-btn" disabled>Next</button>
            @endif
        </div>
    </div>
@endif
