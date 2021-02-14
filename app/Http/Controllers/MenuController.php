<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidasiMenu;
use App\Http\Requests\ValidasiEditMenu;
use App\Models\Model_menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $menu =  Model_menu::select('id_menu', 'nama_menu')
                                ->get(); 

        return view('menu/daftar_menu',
            ['menu' => $menu]
            
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
    public function store(ValidasiMenu $request)
    {
        $validated = $request->validated();

        Model_menu::create([
           'nama_menu' => $request->nama_menu,

       ]);
       return redirect('/menu')
       ->with('pesan_menu', 'Data menu berhasil ditambahkan!');
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
    public function update(ValidasiEditMenu $request, Model_menu $menu)
    {
        $validated = $request->validated();
        
        Model_menu::where('id_menu', $menu->id_menu)
                    ->update([
                        //yang kiri dari database //dan yang kanan dari name form input
                        'nama_menu' => $request->e_nama_menu
                    ]);
        // dd($barang->id_barang);
                        
        return redirect('/menu')->with('pesan_menu', 'Data menu berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_menu $menu)
    {
        Model_menu::destroy($menu->id_menu);
        return redirect('/menu')->with('pesan_menu', 'Data menu berhasil dihapus!');
    }
}
