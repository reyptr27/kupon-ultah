<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{
    use Exportable;

    public function __construct(String $from = null , String $to = null)
    {
         $this->from = $from;
         $this->to   = $to;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->from != null) {
        //dd($this->from);
        return Transaksi::whereBetween('updated_at', [$this->from, $this->to])->get();
        }else {
            return Transaksi::all();
        }
    }

    //return array
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->kode_kupon,
            $transaksi->nama,
            $transaksi->hp,
            $transaksi->jumlah,
            $transaksi->total,
            $transaksi->updated_at,
        ];
    }

    //function header in excel
    public function headings(): array
    {
        return [
            'kode kupon',
            'nama',
            'hp',
            'jumlah',
            'total',
            'tukar kupon',
       ];
   }
}
