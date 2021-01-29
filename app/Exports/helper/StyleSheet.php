<?php


namespace App\Exports\helper;

use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class StyleSheet implements
    WithHeadings,
    WithMapping,
    WithEvents,
    ShouldAutoSize
{
    use RegistersEventListeners;

    public function headings(): array
    {
        return [['ID', 'Name', 'Email', 'Phone', 'Address', 'Date Time'],
            ['','','','','','Created', 'Updated']];
    }

    public function map($user): array
    {
        return [
            $user->id, $user->name, $user->email, $user->phone, $user->address, $user->created_at, $user->updated_at
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:G2';
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
                $delegateSheet->mergeCells('F1:G1');
            }
        ];
    }
}
