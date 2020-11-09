<?php

namespace App\Exports;

use App\Contact;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MessageExport implements FromCollection , ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::all();
    }

    public function map($mg) :array
    { 
        return  [
            $mg->id,
            $mg->nom,
            $mg->email,
            $mg->objet,
            $mg->message,
            $mg->created_at->format('d/m/y à H:m'),
        ];
    } 

    public function headings(): array
    {
        return  [
             'N°',
             'Nom & prénom',
             'Email',
             'Objet',
             'Message',
             'Envoyé le ',
        ]; 
    }

    public function registerEvents(): array
    {
        return  [
             AfterSheet::class=>function (AfterSheet $event){
                 $event->sheet->getStyle('A1:F1')->applyFromArray([
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
