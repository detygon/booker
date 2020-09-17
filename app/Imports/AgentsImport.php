<?php

namespace App\Imports;

use App\Models\Agent;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class AgentsImport implements WithHeadingRow, OnEachRow
{
    use Importable;

    public function onRow(Row $row)
    {
        $data = $row->toArray();

        if (!$data['identifiant']) {
            return;
        }

        $nameParts = explode(' ', $data['nom']);

        return Agent::firstOrCreate(['code' => $data['identifiant']], [
            'phone_number' => $data["telephone"] ?? '',
            'voting_station' => $data["bv"] ?? '',
            'first_name' => strtoupper(implode(' ', array_slice($nameParts, 1))) ?? '',
            'last_name' => strtoupper($nameParts[0]) ?? '',
            'verified' => false,
            'verified_at' => now(),
        ]);
    }
}
