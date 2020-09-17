<?php

namespace App\Exports;

use App\Models\Agent;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AgentsExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'Identifiant',
            'Nom',
            'Contact',
            'Bureau de vote / Département'
        ];
    }

    /**
    * @var Agent $agent
    */
    public function map($agent): array
    {
        return [
            $agent->code,
            $agent->name,
            $agent->phone_number,
            $agent->voting_station,
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Agent::all();
    }
}
