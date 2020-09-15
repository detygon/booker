@if (is_numeric($refresh))
    <div class="{{ $wrapperClass }}" wire:poll.{{ $refresh }}.ms>
    @elseif (is_string($refresh))
        <div class="{{ $wrapperClass }}" wire:poll="{{ $refresh }}">
        @else
            <div class="{{ $wrapperClass }}">
@endif
@include('laravel-livewire-tables::includes._offline')
@include('laravel-livewire-tables::includes._options')

@if (is_string($responsive))
    <div class="{{ $responsive }}">
@endif

<div class="overflow-x-auto">
    <div class="inline-block min-w-full bg-white shadow rounded-lg overflow-hidden ">
        <table class="w-full whitespace-no-wrap bg-white{{ $tableClass }}">
            @include('laravel-livewire-tables::includes._header')
            @include('laravel-livewire-tables::includes._body')
            @include('laravel-livewire-tables::includes._footer')
        </table>
    </div>
</div>

@if (is_string($responsive))
    </div>
@endif

@include('laravel-livewire-tables::includes._pagination')
</div>
