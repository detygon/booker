<?php

namespace App\Imports;

use App\Models\Agent;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AgentsImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nameParts = explode(' ', $row['nom']);

        return new Agent([
            'code' => $row['identifiant'],
            'phone_number' => $row["telephone"] ?? '',
            'voting_station' => $row["bv"],
            'first_name' => implode(' ', array_slice($nameParts, 1)),
            'last_name' => $nameParts[0]
        ]);
    }
}
