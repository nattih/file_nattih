<?php

namespace App\Exports;

use App\Offre;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EmploiExport implements FromCollection , ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Offre::where('offre', '=', 1)->get();
    }

    public function map($offre) :array
    { 
        return  [
            $offre->id,
            $offre->nom,
            $offre->email,
            $offre->motif,
            $offre->created_at->format('d/m/y à H:m'),
        ];
    } 

    public function headings(): array
    {
        return  [
             'N°',
             'Nom & prénom',
             'Email',
             'Ojet',
             'Date de dépot',
        ]; 
    }

    public function registerEvents(): array
    {
        return  [
             AfterSheet::class=>function (AfterSheet $event){
                 $event->sheet->getStyle('A1:E1')->applyFromArray([
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
