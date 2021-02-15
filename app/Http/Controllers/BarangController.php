<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\ValidasiBarang;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ValidasiExcelBarang;
use App\Models\Model_barang;
use App\Models\Model_satuan;
use App\Models\Model_merek;
use App\Exports\BarangExport;
use App\Imports\BarangImport;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang =  Model_barang::join('satuan', 'barang.satuan_id', '=', 'satuan.id_satuan')
                                ->join('merek', 'barang.merek_id', '=', 'merek.id_merek')
                                ->select('id_barang', 'nama_barang', 'satuan_id', 'merek_id', 'harga_barang', 'nama_satuan', 'nama_merek')
                                ->get();
        $satuan =  Model_satuan::select('id_satuan', 'nama_satuan')
                                ->get(); 
        $merek =  Model_merek::select('id_merek', 'nama_merek')
                                ->get();

        //dd($merek);

        return view('barang/daftar_barang',
            ['barang' => $barang, 'merek' => $merek, 'satuan' => $satuan]
            
        );


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidasiBarang $request)
    {

        $validated = $request->validated();

         Model_barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'satuan_id' => $request->satuan_id,
            'merek_id' => $request->merek_id

        ]);



        return redirect('/barang')
        ->with('pesan_barang', 'Data barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model_barang $barang)
    {
        $nama_lama = $barang->nama_barang;
        $nama_baru = $request->e_nama_barang;
        $aturan_nama = 'required|unique:barang,nama_barang';

        if($nama_baru == $nama_lama){
            $aturan_nama = 'required';
        }

        Validator::make($request->all(), [
            'e_nama_barang' => $aturan_nama,
            'e_harga_barang' => 'required|numeric',
            'e_merek_id' => 'required',
            'e_satuan_id' => 'required'
        ],[

            'e_nama_barang.required' => 'Harus diisi!',
            'e_nama_barang.unique' => 'Nama itu sudah ada!',
            'e_harga_barang.required' => 'Harus diisi!',
            'e_harga_barang.numeric' => 'Harus angka!',
            'e_satuan_id.required' => 'Harus dipilih',
            'e_merek_id.required' => 'Harus dipilih!'
        ])->validate();
        
        Model_barang::where('id_barang', $barang->id_barang)
                    ->update([
                        //yang kiri dari database //dan yang kanan dari name form input
                        'nama_barang' => $request->e_nama_barang,
                        'satuan_id' => $request->e_satuan_id,
                        'merek_id' => $request->e_merek_id,
                        'harga_barang' => $request->e_harga_barang
                    ]);
        // dd($barang->id_barang);
                        
        return redirect('/barang')->with('pesan_barang', 'Data barang berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_barang $barang)
    {
        Model_barang::destroy($barang->id_barang);
        return redirect('/barang')->with('pesan_barang', 'Data barang berhasil dihapus!');
    
    }

    public function export()
    {
        $tanggal = date('Y-m-d');
        return Excel::download(new BarangExport, "$tanggal-daftar-barang.xls", \Maatwebsite\Excel\Excel::XLS);
    }

    public function import(ValidasiExcelBarang $request) 
    {
        $validated = $request->validated();

        // if ($request->hasFile('excel_barang')) {
            $barang = $request->file('excel_barang');
            Excel::import(new BarangImport, $barang);
            return redirect('/barang')->with('pesan_barang', 'Data barang berhasil ditambahkan');    
        // }

        
    }

}
