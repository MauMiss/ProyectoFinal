@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            {{-- Enlace de página anterior --}}
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-[#EFBBE1] border border-[#EFBBE1] cursor-default leading-5 rounded-md">
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-[#823E70] bg-[#EFBBE1] border border-[#EFBBE1] leading-5 rounded-md hover:bg-[#d8a7cc] focus:outline-none focus:ring ring-[#EFBBE1] focus:border-[#C79DC1] active:bg-[#C79DC1] transition ease-in-out duration-150">
                    Previous
                </a>
            @endif

            {{-- Enlace de página siguiente --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-[#823E70] bg-[#EFBBE1] border border-[#EFBBE1] leading-5 rounded-md hover:bg-[#d8a7cc] focus:outline-none focus:ring ring-[#EFBBE1] focus:border-[#C79DC1] active:bg-[#C79DC1] transition ease-in-out duration-150">
                    Next
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-[#EFBBE1] border border-[#EFBBE1] cursor-default leading-5 rounded-md">
                    Next
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    Mostrando
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    a
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    de
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    resultados
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Enlace de página anterior --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="Previous">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-[#EFBBE1] border border-[#EFBBE1] cursor-default rounded-l-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 14.707a1 1 0 01-1.414 0L7.293 10.707a1 1 0 010-1.414L11.293 5.293a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-[#823E70] bg-[#EFBBE1] border border-[#EFBBE1] rounded-l-md leading-5 hover:bg-[#d8a7cc] focus:z-10 focus:outline-none focus:ring ring-[#EFBBE1] focus:border-[#C79DC1] active:bg-[#C79DC1] active:text-gray-500 transition ease-in-out duration-150" aria-label="Previous">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 14.707a1 1 0 01-1.414 0L7.293 10.707a1 1 0 010-1.414L11.293 5.293a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Elementos de paginación --}}
                    @foreach ($elements as $element)
                        {{-- Separador de "Tres Puntos" --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-[#EFBBE1] border border-[#EFBBE1] cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array de Enlaces --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-[#823E70] border border-[#823E70] cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#823E70] bg-[#EFBBE1] border border-[#EFBBE1] leading-5 hover:bg-[#d8a7cc] focus:z-10 focus:outline-none focus:ring ring-[#EFBBE1] focus:border-[#C79DC1] active:bg-[#C79DC1] transition ease-in-out duration-150" aria-label="Go to page {{ $page }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Enlace de página siguiente --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-[#823E70] bg-[#EFBBE1] border border-[#EFBBE1] rounded-r-md leading-5 hover:bg-[#d8a7cc] focus:z-10 focus:outline-none focus:ring ring-[#EFBBE1] focus:border-[#C79DC1] active:bg-[#C79DC1] active:text-gray-500 transition ease-in-out duration-150" aria-label="Next">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 001.414 0L12.707 10.707a1 1 0 000-1.414L8.707 5.293a1 1 0 10-1.414 1.414L10.586 10l-3.293 3.293a1 1 0 000 1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="Next">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-[#EFBBE1] border border-[#EFBBE1] cursor-default rounded-r-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 001.414 0L12.707 10.707a1 1 0 000-1.414L8.707 5.293a1 1 0 10-1.414 1.414L10.586 10l-3.293 3.293a1 1 0 000 1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
