@if ($paginationEnabled || $searchEnabled)
    <div class="mb-4 flex justify-between items-center">
        @if ($paginationEnabled && $perPageEnabled)
            <div class="relative mr-2">
                @lang('laravel-livewire-tables::strings.per_page'): &nbsp;

                <select wire:model="perPage" class="form-select focus:outline-none focus:shadow-outline text-gray-600 font-medium bg-white rounded-lg shadow">
                    @if (is_array($perPageOptions))
                        @foreach ($perPageOptions as $option)
                            <option>{{ $option }}</option>
                        @endforeach
                    @else
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                    @endif
                </select>
            </div>
        @endif

        @if ($searchEnabled)
            <div class="relative md:w-1/3">
                @if ($clearSearchButton)
                    <div class="input-group">
                @endif
                    <input
                        @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce') wire:model.debounce.{{ $searchDebounce }}ms="search" @endif
                        @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
                        @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                        class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600
                        font-medium"
                        type="text"
                        placeholder="{{ __('laravel-livewire-tables::strings.search') }}"
                    />
                @if ($clearSearchButton)
                        <div class="input-group-append">
                            <button class="{{ $clearSearchButtonClass }}" type="button" wire:click="clearSearch">@lang('laravel-livewire-tables::strings.clear')</button>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
@endif
