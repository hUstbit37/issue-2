<?php

namespace App\Exports;

use App\Exports\helper\Export;
use App\Exports\helper\UsersPerMonthSheet;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class UserExport implements
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithEvents,
    FromView
{
    use RegistersEventListeners;

    public function view(): View
    {
        return view('exports.users.table', [
            'users' => User::with('school')->get()
        ]);
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Email', 'Phone', 'Address', 'School', 'Created', 'Updated'];
    }

    public function map($user): array
    {
        return [
            $user->id, $user->name, $user->email, $user->phone, $user->address, $user->school->school, $user->created_at, $user->updated_at
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:H2';
                $delegateSheet = $event->sheet->getDelegate();
                $delegateSheet->getStyle($cellRange)
                    ->getFont()->setSize(15);
                $delegateSheet->getStyle($cellRange)
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('309eb7');
                $event->sheet->setAutoFilter($cellRange);
                $delegateSheet->getStyle($cellRange)->getAlignment()
                    ->setVertical('center')
                    ->setHorizontal('center');
            }
        ];
    }


}
