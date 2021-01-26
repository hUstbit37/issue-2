<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeImport;

class UsersImport implements ToModel, WithHeadingRow, WithEvents
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'email' => $row[1]
        ]);
    }

    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function(BeforeImport $event) {
                $creator = $event->reader->getProperties()->getCreator();
            }
        ];
    }
}
