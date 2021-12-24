<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Model_merek;

class MerekController extends Controller
{
   
    public function index(){
        $merek =  Model_merek::select('id_merek', 'nama_merek')
                    ->get();
        return view('merek/daftar_merek',
            ['merek' => $merek]
        );
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nama_merek' => 'required|unique:merek,nama_merek',
        ],[

            'nama_merek.required' => 'Harus dipilih!',
            'nama_merek.unique' => 'Nama itu sudah ada!',
          

        ])->validate();

        Model_merek::create([
           'nama_merek' => $request->nama_merek,

       ]);
       return redirect('/merek')
       ->with('pesan_merek', 'Data merek berhasil ditambahkan!');
    }

  
    public function update(Request $request, Model_merek $merek)
    {
        ///////////////Validasi merek Unique////////////
        Validator::make($request->all(), [
            'e_nama_merek' => 'required|unique:merek,nama_merek',
        ],[

            'e_nama_merek.required' => 'Harus dipilih!',
            'e_nama_merek.unique' => 'Nama itu sudah ada!',
          

        ])->validate();
        Model_merek::where('id_merek', $merek->id_merek)
                    ->update([
                        'nama_merek' => $request->e_nama_merek,
                    ]);
                        
        return redirect('/merek')->with('pesan_merek', 'Data merek berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_merek $merek)
    {
        Model_merek::destroy($merek->id_merek);
        return redirect('/merek')->with('pesan_merek', 'Data merek berhasil dihapus!');
    }
}
