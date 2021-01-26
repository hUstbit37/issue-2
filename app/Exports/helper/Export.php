<?php

namespace App\Exports\helper;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Export implements WithEvents
{
    /**
     * @var array
     */
    private $background;

    public function registerEvents(): array
    {
        return [ AfterSheet::class => function(AfterSheet $event) {
            $delegateSheet = $event->sheet->getDelegate();
            foreach ($this->background as $region => $item) {
                $delegateSheet->getStyle($region)->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => [ 'rgb' => $item],
                        'endColor' => [
                            'rgb' => $item,
                        ],
                    ]
                ]);
            }
        }];
    }

    public function setBackground( array $background)
    {
        $this->background = array_change_key_case($background, CASE_UPPER);
    }
}
