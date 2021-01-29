<?php


namespace App\Exports\helper;


use App\User;
use DateTime;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Exports\helper\StyleSheet;

class UserPerMonthSheet extends StyleSheet implements FromQuery, WithTitle, ShouldAutoSize
{
    protected $year;
    protected $month;
    public function __construct(int $year, int $month)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function query()
    {
         return User
             ::query()
             ->whereYear('created_at', $this->year)
             ->whereMonth('created_at', $this->month);
    }


    public function title(): string
    {
        return DateTime::createFromFormat('!m', $this->month)->format('F');
    }
}
