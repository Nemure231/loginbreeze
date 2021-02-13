<?php

namespace App\Imports;
use App\Models\Model_barang;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Model_barang([
            'nama_barang'     => $row[0],
            'harga_barang'    => $row[1], 
            'merek_id' =>    $row[2],
            'satuan_id' =>   $row[3]
        ]);
    }
}
