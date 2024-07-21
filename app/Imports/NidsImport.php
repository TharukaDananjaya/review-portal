<?php

namespace App\Imports;

use App\Models\Nid;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class NidsImport implements ToCollection, ToModel
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
    }
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Skip the first row (headers)
    }

    public function model(array $row)
    {
        $existingPerson = Nid::where('nid', $row[1])->first();

        // If the person with the current NID exists, delete it
        if ($existingPerson) {
            $existingPerson->delete();
        }
        return new Nid([
            'name' => $row['0'],
            'nid' => $row['1'],
        ]);
    }
}
