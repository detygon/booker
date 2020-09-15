@if ($tableHeaderEnabled)
    <thead
        class="text-xs font-semibold tracking-wide text-left text-gray-200 uppercase border-b dark:border-gray-700 bg-gray-800 dark:text-gray-400 dark:bg-gray-800 {{ $tableHeaderClass }}">
        @include('laravel-livewire-tables::includes._columns')
    </thead>
@endif
