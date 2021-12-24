<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Model_satuan;

class SatuanController extends Controller
{
   
    public function index(){
        $satuan =  Model_satuan::select('id_satuan', 'nama_satuan')
                    ->get();
        return view('satuan/daftar_satuan',
            ['satuan' => $satuan]
        );
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nama_satuan' => 'required|unique:satuan,nama_satuan',
        ],[

            'nama_satuan.required' => 'Harus dipilih!',
            'nama_satuan.unique' => 'Nama itu sudah ada!',
          

        ])->validate();

        Model_satuan::create([
           'nama_satuan' => $request->nama_satuan,

       ]);
       return redirect('/satuan')
       ->with('pesan_satuan', 'Data satuan berhasil ditambahkan!');
    }

  
    public function update(Request $request, Model_satuan $satuan)
    {
        ///////////////Validasi satuan Unique////////////
        Validator::make($request->all(), [
            'e_nama_satuan' => 'required|unique:satuan,nama_satuan',
        ],[

            'e_nama_satuan.required' => 'Harus dipilih!',
            'e_nama_satuan.unique' => 'Nama itu sudah ada!',
          

        ])->validate();
        Model_satuan::where('id_satuan', $satuan->id_satuan)
                    ->update([
                        'nama_satuan' => $request->e_nama_satuan,
                    ]);
                        
        return redirect('/satuan')->with('pesan_satuan', 'Data satuan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_satuan $satuan)
    {
        Model_satuan::destroy($satuan->id_satuan);
        return redirect('/satuan')->with('pesan_satuan', 'Data satuan berhasil dihapus!');
    }
}
