<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidasiBarang;
use App\Http\Requests\ValidasiEditBarang;
use App\Models\Model_barang;
use App\Models\Model_satuan;
use App\Models\Model_merek;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang =  Model_barang::select('id_barang', 'nama_barang', 'satuan_id', 'merek_id', 'harga_barang')
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
    public function update(ValidasiEditBarang $request, $id)
    {
        $validated = $request->validated();
        //view('barang/daftar_barang', ['barang' => $barang]);

        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}