<?php

namespace App\Exports;

use App\Exports\helper\UserPerMonthSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserMultiSheetExport implements WithMultipleSheets
{
    protected $year;
    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function sheets(): array
    {
        $sheet = [];

        for ($month = 1; $month <= 12; $month++) {
            $sheet[] = new UserPerMonthSheet($this->year, $month);
        }
        return $sheet;
    }
}
