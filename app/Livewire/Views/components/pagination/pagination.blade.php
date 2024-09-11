@php
if (! isset($scrollTo)) {
$scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
? <<<JS
    (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '' ;
    @endphp

    <div class="pagination-container">
    @if ($paginator->hasPages())
    <nav class="pagination d-flex flex-column align-items-center">
        <!-- Mobile View -->
        <div class="d-flex flex-column flex-md-row justify-content-center mb-3">
            <ul class="pagination pagination-sm">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&lsaquo; prev</span>
                </li>
                @else
                <li class="page-item">
                    <button type="button" class="page-link" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">&lsaquo; prev</button>
                </li>
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
                <li class="page-item active" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                @else
                <li class="page-item"><button type="button" class="page-link" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}">{{ $page }}</button></li>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <li class="page-item">
                    <button type="button" class="page-link" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">next &rsaquo;</button>
                </li>
                @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">next &rsaquo;</span>
                </li>
                @endif
            </ul>
        </div>
    </nav>
    @endif
    </div>

    @section('styles')
    <style>
        /* Container for pagination */
        .pagination-container {
            padding: 20px;
        }

        /* Pagination nav styling */
        .pagination {
            border-radius: 50px;
            background: #f5f5f5;
            padding: 10px 20px;
        }

        /* Pagination items */
        .page-item {
            margin: 0 5px;
        }

        .page-link {
            border-radius: 30px;
            background: #ff5500 !important;
            color: #ffffff;
            border: 1px solid #ff5500 !important;
            padding: 8px 16px;
            font-size: 14px;
        }

        .page-item.active .page-link {
            background: #ff5500 !important;
            border-color: #ff5500 !important;
        }

        .page-item.disabled .page-link {
            background: #e0e0e0;
            color: #b0b0b0;
            border-color: #e0e0e0;
        }

        .page-link:hover {
            background: #ff5500 !important;
            border-color: #ff5500 !important;
            color: #ffffff;
        }

        /* Mobile view adjustments */
        @media (max-width: 767.98px) {
            .pagination {
                font-size: 12px;
            }

            .page-link {
                padding: 6px 12px;
            }
        }

        /* Desktop view adjustments */
        @media (min-width: 768px) {
            .pagination-summary {
                font-size: 16px;
            }
        }
    </style>
    @endsection