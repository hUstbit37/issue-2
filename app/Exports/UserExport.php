<?php

namespace App\Exports;

use App\Exports\helper\UsersPerMonthSheet;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Exports\helper\StyleSheet;

class UserExport extends StyleSheet implements
    ShouldAutoSize,
    FromView
{
    public function view(): View
    {
        return view('exports.users.table', [
            'users' => User::all()
        ]);
    }

    public function headings(): array
    {
        return parent::headings();
    }

    public function map($user): array
    {
        return parent::map();
    }

    public function registerEvents(): array
    {
       return parent::registerEvents();
    }
}
