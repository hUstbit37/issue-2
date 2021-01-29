<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use App\Exports\helper\StyleSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserExportQuery extends StyleSheet implements FromQuery, ShouldAutoSize
{
    use Exportable;

    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function query()
    {
        return User::whereBetween('created_at', [$this->from,$this->to]);
    }

}
