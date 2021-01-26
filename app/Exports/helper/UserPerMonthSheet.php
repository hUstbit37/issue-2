<?php


namespace App\Exports\helper;


use App\User;
use DateTime;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserPerMonthSheet implements FromQuery, WithTitle
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
