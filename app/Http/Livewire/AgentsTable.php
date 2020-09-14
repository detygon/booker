<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AgentsTable extends TableComponent
{
    public function query(): Builder
    {
        return Agent::query();
    }

    public function columns(): array
    {
        return [
            Column::make('Identifiant', 'code'),
            Column::make('Nom', 'name')->customAttribute(),
        ];
    }
}
