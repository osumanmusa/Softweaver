<?php
namespace App\Imports;
use App\Models\Regforms;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\FromCollection;
class FormsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Regforms::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name'     ,
            'Gender'    ,
            'Company' ,
            'Role'     ,
            'Email'    ,
            'Mobile' ,
            'Whatsapp'  ,   
            'Date commencing' ,
            'Date Created',
            'Date Updated' 
        ];
    }


       public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },
        ];
    }



}