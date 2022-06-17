<div>
    @if ($paginator->hasPages())
    @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ?
    $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ :
    $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)

    <div class="toolbox toolbox-pagination justify-content-between">
        <p class="showing-info mb-2 mb-sm-0"> نمایش <span>{{$paginator->firstItem()}} - {{$paginator->lastItem()}} از
                {{$paginator->total()}}</span>محصول</p>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="prev disabled">
                <span aria-label="قبلی " tabindex="-1" aria-disabled="true">
                    <i class="w-icon-long-arrow-right"></i>قبلی
                </span>
            </li>
            @else
            <li class="prev">
                <a href="javascript:void(0);"
                    dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                    aria-label="قبلی " wire:click="previousPage('{{ $paginator->getPageName() }}')"
                    wire:loading.attr="disabled" rel="prev">
                    <i class="w-icon-long-arrow-right"></i>قبلی
                </a>
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
            <li class="page-item active"
                wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"
                aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
            <li class="page-item"
                wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                <button type="button" class="page-link"
                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button></li>
            @endif
            @endforeach
            @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="next">
                <a href="javascript:void(0);"
                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                    aria-label="بعدی " wire:click="nextPage('{{ $paginator->getPageName() }}')"
                    wire:loading.attr="disabled" rel="next">
                    بعدی <i class="w-icon-long-arrow-left"></i>
                </a>
            </li>
            @else
            <li class="next disabled">
                <span aria-label="بعدی " tabindex="-1" aria-disabled="true">
                    بعدی <i class="w-icon-long-arrow-left"></i>
                </span>
            </li>
            @endif
        </ul>
    </div>
    @endif
</div>