<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        //    'route_menu' => $request->route_menu

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
    public function update(Request $request, Model_menu $menu)
    {
        ///////////////Validasi Menu Unique////////////
        $nama_lama = $menu->nama_menu;
        $nama_baru = $request->e_nama_menu;
        $aturan_nama = 'required|unique:menu,nama_menu';

         ///////////////Validasi Route Menu Unique////////////
        //  $route_lama = $menu->route_menu;
        //  $route_baru = $request->e_route_menu;
        //  $aturan_route = 'required|unique:menu,route_menu';

        // dd([$nama_lama, $nama_baru]);

        if($nama_baru == $nama_lama){
            $aturan_nama = 'required';
        }


        // if($route_baru == $route_lama){
        //     $aturan_route = 'required';
        // }

        Validator::make($request->all(), [
            'e_nama_menu' => $aturan_nama,
            // 'e_route_menu' => $aturan_route
        ],[

            'e_nama_menu.required' => 'Harus dipilih!',
            'e_nama_menu.unique' => 'Nama itu sudah ada!',
            // 'e_route_menu.required' => 'Harus dipilih!',
            // 'e_route_menu.unique' => 'Route itu sudah ada!'

        ])->validate();
        
        Model_menu::where('id_menu', $menu->id_menu)
                    ->update([
                        //yang kiri dari database //dan yang kanan dari name form input
                        'nama_menu' => $request->e_nama_menu,
                        // 'route_menu' =>$request->e_route_menu
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
