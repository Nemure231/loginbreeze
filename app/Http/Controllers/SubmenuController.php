<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidasiSubmenu;
use Illuminate\Support\Facades\Validator;
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
                                ->select('id_submenu', 'menu_id','nama_submenu', 'url_submenu', 'nama_menu')
                                // ->select('route_submenu')
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
    public function update(Request $request, Model_submenu $submenu)
    {
        /////setelah tanda panah ini diambilnya name inputannya
        $nama_lama = $submenu->nama_submenu;
        $nama_baru = $request->e_nama_submenu;
        $aturan_nama = 'required|unique:submenu,nama_submenu';
        ///////////Validasi Route UNique/////////////

        // $route_lama = $submenu->route_submenu;
        // $route_baru = $request->e_route_submenu;
        // $aturan_route = 'required|unique:submenu,route_submenu';

        ///////////////Validasi Url Unique////////////
        $url_lama = $submenu->url_submenu;
        $url_baru = $request->e_url_submenu;
        $aturan_url = 'required|unique:submenu,url_submenu';

        // dd([$nama_lama, $nama_baru]);

        if($nama_baru == $nama_lama){
            $aturan_nama = 'required';
        }

        // if($route_baru == $route_lama){
        //     $aturan_route = 'required';
        // }

        if($url_baru == $url_lama){
            $aturan_url = 'required';
        }
       
        Validator::make($request->all(), [
            'e_menu_id' => 'required',
            'e_nama_submenu' => $aturan_nama,
            // 'e_route_submenu' => $aturan_route,
            'e_url_submenu' => $aturan_url,
        ],[

            'e_menu_id.required' => 'Harus dipilih!',
            'e_nama_submenu.required' => 'Harus diisi!',
            'e_nama_submenu.unique' => 'Nama itu sudah ada',
            // 'e_route_submenu.required' => 'Harus diisi!',
            // 'e_route_submenu.unique' => 'ROute itu sudah ada!',
            'e_url_submenu.required' => 'Harus diisi!',
            'e_url_submenu.unique' => 'Url itu sudah ada!'

        ])->validate();
        
        Model_submenu::where('id_submenu', $submenu->id_submenu)
                    ->update([
                        //yang kiri dari database //dan yang kanan dari name form input
                        'menu_id' => $request->e_menu_id,
                        'nama_submenu' => $request->e_nama_submenu,
                        // 'route_submenu' => $request->e_route_submenu,
                        'url_submenu' => $request->e_url_submenu
             
                    ]);
                        
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
