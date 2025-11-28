@php
    if (! isset($scrollTo)) {
        $scrollTo = 'body';
    }

    $scrollIntoViewJsSnippet = ($scrollTo !== false)
        ? <<<JS
           (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
        JS
        : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-end">

            <div class="flex items-center max-md:flex-col max-md:items-end max-md:items-end gap-6">
                <div>
                    <p class="text-base font-normal dark:text-gray-400">
                        {!! __('pagination.showing') !!}
                        @if ($paginator->firstItem())
                            <span class="">{{ $paginator->firstItem() }}</span>
                            {!! __('pagination.to') !!}
                            <span class="">{{ $paginator->lastItem() }}</span>
                        @else
                            {{ $paginator->count() }}
                        @endif
                        {!! __('pagination.of') !!}
                        <span class="">{{ $paginator->total() }}</span>
                        <span class="font-bold">
                    {!! __('pagination.results', ['results' => $results_name]) !!}
                    </span>
                    </p>
                </div>

                <div>
                <span class="relative z-0 flex gap-2">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span class="p-1 rounded-lg border border-gray-300" aria-disabled="true"
                              aria-label="{{ __('pagination.previous') }}">
                            <span aria-hidden="true">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M15.2485 6.35159C15.4735 6.57662 15.5999 6.88179 15.5999 7.19999C15.5999 7.51818 15.4735 7.82335 15.2485 8.04839L11.2969 12L15.2485 15.9516C15.4671 16.1779 15.5881 16.481 15.5853 16.7957C15.5826 17.1103 15.4564 17.4113 15.2339 17.6338C15.0114 17.8563 14.7105 17.9825 14.3958 17.9852C14.0812 17.9879 13.7781 17.867 13.5517 17.6484L8.75173 12.8484C8.52677 12.6234 8.40039 12.3182 8.40039 12C8.40039 11.6818 8.52677 11.3766 8.75173 11.1516L13.5517 6.35159C13.7768 6.12662 14.0819 6.00024 14.4001 6.00024C14.7183 6.00024 15.0235 6.12662 15.2485 6.35159Z"
                                          fill="#6C6D6E"/>
                                </svg>

                            </span>
                        </span>
                    @else
                        <a wire:navigate
                           href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           class="p-1 rounded-lg border border-green-300 hover:bg-green-100"
                           aria-label="{{ __('pagination.previous') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M15.2485 6.35159C15.4735 6.57662 15.5999 6.88179 15.5999 7.19999C15.5999 7.51818 15.4735 7.82335 15.2485 8.04839L11.2969 12L15.2485 15.9516C15.4671 16.1779 15.5881 16.481 15.5853 16.7957C15.5826 17.1103 15.4564 17.4113 15.2339 17.6338C15.0114 17.8563 14.7105 17.9825 14.3958 17.9852C14.0812 17.9879 13.7781 17.867 13.5517 17.6484L8.75173 12.8484C8.52677 12.6234 8.40039 12.3182 8.40039 12C8.40039 11.6818 8.52677 11.3766 8.75173 11.1516L13.5517 6.35159C13.7768 6.12662 14.0819 6.00024 14.4001 6.00024C14.7183 6.00024 15.0235 6.12662 15.2485 6.35159Z"
                                          fill="#6C6D6E"/>
                                </svg>
                        </a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a wire:navigate
                           href="{{ $paginator->nextPageUrl() }}" rel="next"
                           class="p-1 rounded-lg border border-green-300 hover:bg-green-100"
                           aria-label="{{ __('pagination.next') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M8.75147 17.6484C8.5265 17.4234 8.40012 17.1182 8.40012 16.8C8.40012 16.4818 8.5265 16.1766 8.75147 15.9516L12.7031 12L8.75147 8.04841C8.53288 7.82209 8.41192 7.51897 8.41466 7.20433C8.41739 6.8897 8.54359 6.58872 8.76608 6.36623C8.98857 6.14374 9.28955 6.01754 9.60419 6.01481C9.91882 6.01207 10.2219 6.13302 10.4483 6.35161L15.2483 11.1516C15.4732 11.3766 15.5996 11.6818 15.5996 12C15.5996 12.3182 15.4732 12.6234 15.2483 12.8484L10.4483 17.6484C10.2232 17.8734 9.91806 17.9998 9.59987 17.9998C9.28167 17.9998 8.9765 17.8734 8.75147 17.6484Z"
                                          fill="#6C6D6E"/>
                                </svg>
                        </a>
                    @else
                        <span class="p-1 rounded-lg border border-gray-300" aria-disabled="true"
                              aria-label="{{ __('pagination.next') }}">
                            <span aria-hidden="true">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M8.75147 17.6484C8.5265 17.4234 8.40012 17.1182 8.40012 16.8C8.40012 16.4818 8.5265 16.1766 8.75147 15.9516L12.7031 12L8.75147 8.04841C8.53288 7.82209 8.41192 7.51897 8.41466 7.20433C8.41739 6.8897 8.54359 6.58872 8.76608 6.36623C8.98857 6.14374 9.28955 6.01754 9.60419 6.01481C9.91882 6.01207 10.2219 6.13302 10.4483 6.35161L15.2483 11.1516C15.4732 11.3766 15.5996 11.6818 15.5996 12C15.5996 12.3182 15.4732 12.6234 15.2483 12.8484L10.4483 17.6484C10.2232 17.8734 9.91806 17.9998 9.59987 17.9998C9.28167 17.9998 8.9765 17.8734 8.75147 17.6484Z"
                                          fill="#6C6D6E"/>
                                </svg>

                            </span>
                        </span>
                    @endif
                </span>
                </div>
            </div>

        </nav>
    @endif
</div>
