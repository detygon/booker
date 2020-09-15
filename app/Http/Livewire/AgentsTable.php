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
            Column::make('Identifiant', 'code')->sortable()->searchable(),
            Column::make('Nom', 'name')->customAttribute()->searchable(function ($builder, $term) {
                return $builder
                        ->orWhere('first_name', 'like', '%' . $term . '%')
                        ->orWhere('last_name', 'like', '%' . $term . '%');
            }),
            Column::make('Bureau de vote', 'voting_station')->searchable(),
            Column::make('Téléphone', 'phone_number'),
            Column::make('Statut')->view('partials.agents._table-actions', 'agent'),
        ];
    }
}
