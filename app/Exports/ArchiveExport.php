<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ArchiveExport implements FromCollection , ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('deleted_at', '=', 0)->get();
    }
    public function map($user) :array
    { 
        return  [
            $user->id,
            $user->name,
            $user->prenom,
            $user->email,
            // $user->motif,
            $user->updated_at->format('d/m/y à H:m'),
        ];
    } 

    public function headings(): array
    {
        return  [
             'N°',
             'Nom & prénom',
             'Email',
             'Ojet',
             'Fin du contrat',
        ]; 
    }

    public function registerEvents(): array
    {
        return  [
             AfterSheet::class=>function (AfterSheet $event){
                 $event->sheet->getStyle('A1:K1')->applyFromArray([
                     'font'=>[
                         'bold'=>true,
                         'size'=>16,
                         'color'=>['argb' => 'FFFF0000'],
                     ],
                 ]);
             },
       ]; 
    }
}
