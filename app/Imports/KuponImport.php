<?php

namespace App\Imports;

use App\Models\Kupon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class KuponImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kupon([
            'kode_kupon' => $row['kode_kupon'],
            'jumlah' => $row['jumlah'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.kode_kupon' => ['required', 'alpha_num', 'size:10', 'unique:kupon,kode_kupon'],
            '*.jumlah' => ['required', 'numeric', 'digits:1', 'min:1'] 
        ];
    }

    public function customValidationMessages()
    {
        return [
            'jumlah.digits' => 'Maximal value for :attribute = 9.',
            'jumlah.min' => 'Minimum value for :attribute = 1.',
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
