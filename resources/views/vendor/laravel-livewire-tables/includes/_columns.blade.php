@if ($checkbox && $checkboxLocation === 'left')
    @include('laravel-livewire-tables::includes._checkbox-all')
@endif

@foreach ($columns as $column)
    @if (!$column->isHidden())
        <th class="{{ $this->setTableHeadClass($column->attribute) }}  px-4 py-3"
            id="{{ $this->setTableHeadId($column->attribute) }}" @foreach ($this->setTableHeadAttributes($column->attribute) as $key => $value)
            {{ $key }}="{{ $value }}"
    @endforeach
    >
    @if ($column->sortable)
        <span style="cursor: pointer;" wire:click="sort('{{ $column->attribute }}')"
            class="flex items-center space-x-1">
            {{ $column->text }}

            @if ($sortField !== $column->attribute)
                <i class="{{ $sortDefaultClass }}"></i>
            @elseif ($sortDirection === 'asc')
                <i class="{{ $ascSortClass }}"></i>
            @else
                <i class="{{ $descSortClass }}"></i>
            @endif
        </span>
    @else
        {{ $column->text }}
    @endif
    </th>
@endif
@endforeach

@if ($checkbox && $checkboxLocation === 'right')
    @include('laravel-livewire-tables::includes._checkbox-all')
@endif
