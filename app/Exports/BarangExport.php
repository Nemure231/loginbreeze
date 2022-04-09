<?php

namespace App\Exports;

use App\Models\Model_barang;
// use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class BarangExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Model_barang::join('satuan', 'barang.satuan_id', '=', 'satuan.id_satuan')
//                                     ->join('merek', 'barang.merek_id', '=', 'merek.id_merek')
//                                     ->select('nama_barang', 'harga_barang', 'nama_satuan', 'nama_merek')
//                                     ->get();
//     }
// }


class BarangExport implements FromView
{
    public function view(): View
    {
        $barang = Model_barang::join('satuan', 'barang.satuan_id', '=', 'satuan.id_satuan')
                                    ->join('merek', 'barang.merek_id', '=', 'merek.id_merek')
                                     ->select('nama_barang', 'harga_barang', 'nama_satuan', 'nama_merek')
                                     ->get();
        return view('excel.barang_excel', [
            'barang' => $barang
        ]);
    }
}
