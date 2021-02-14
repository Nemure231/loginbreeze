<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidasiSubmenu;
use App\Http\Requests\ValidasiEditSubmenu;
use App\Models\Model_submenu;
use App\Models\Model_menu;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $submenu =  Model_submenu::join('menu', 'submenu.menu_id', '=', 'menu.id_menu')
                                ->select('id_submenu', 'menu_id','nama_submenu', 'route_submenu', 'url_submenu', 'nama_menu')
                                ->get();
        $menu =     Model_menu::select('id_menu', 'nama_menu')
                                    ->get();
        return view('submenu/daftar_submenu',
            ['submenu' => $submenu, 'menu' => $menu]
            
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
    public function store(ValidasiSubmenu $request)
    {
        $validated = $request->validated();

        Model_submenu::create([
            'menu_id' => $request->menu_id,
           'nama_submenu' => $request->nama_submenu,
           'route_submenu' => $request->route_submenu,
           'url_submenu' => $request->url_submenu

       ]);
       return redirect('menu/submenu')
       ->with('pesan_submenu', 'Data submenu berhasil ditambahkan!');
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
    public function update(ValidasiEditSubmenu $request, Model_submenu $submenu)
    {
       
        
        // $request->validate([
        //     'e_menu_id' => 'required',
        //     'e_nama_submenu' => 'required',
        //     'e_route_submenu' => 'required',
        //     'e_url_submenu' => 'required'
        // ]);

        $validated = $request->validated();
        
        Model_submenu::where('id_submenu', $submenu->id_submenu)
                    ->update([
                        //yang kiri dari database //dan yang kanan dari name form input
                        'menu_id' => $request->e_menu_id,
                        'nama_submenu' => $request->e_nama_submenu,
                        'route_submenu' => $request->e_route_submenu,
                        'url_submenu' => $request->e_url_submenu
             
                    ]);
        // dd($barang->id_barang);
                        
        return redirect('menu/submenu')->with('pesan_submenu', 'Data submenu berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_submenu $submenu)
    {
        Model_submenu::destroy($submenu->id_submenu);
        return redirect('menu/submenu')->with('pesan_submenu', 'Data submenu berhasil dihapus!');
    }
}
