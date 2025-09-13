<?php

namespace App\Exports;

use App\Models\Salon;
use Maatwebsite\Excel\Concerns\FromCollection;

final class SalonExport implements FromCollection
{
    /**
     * @var Salon
     */
    public readonly Salon $salon;

    public function __construct(Salon $salon)
    {
        $this->salon = $salon;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = $this->salon->query();

        return $query->first();
    }
}
