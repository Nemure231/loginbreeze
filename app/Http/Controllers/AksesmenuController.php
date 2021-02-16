<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model_akses_menu;
use App\Models\Model_menu;
use App\Models\Model_role;
use Illuminate\Support\Facades\Auth;


class AksesmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request, Model_akses_menu $role_akses)
    {
        $role_id = $role_akses->id_akses_menu;
        
        $role = Auth::user()->role_id;

        $rolenmenu= Model_menu::select('id_menu', 'nama_menu')
                    ->where('id_menu', '>', 1)
                    ->where('nama_menu', '!=', 'Role')
                    ->get();
        $id_role =  Model_role::select('id_role')
                    ->where('id_role', $role_id)
                    ->first();
        // return dd($id_role);

        return view('role_akses/daftar_role_akses',['role_n_menu'=> $rolenmenu, 'id_role' => $id_role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $this->model->UbahRole($menu_id, $role_id);
        $menu_id = $request->menu_id;
		$role_id = $request->role_id;

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];
        $result = Model_akses_menu::select('role_id', 'menu_id')->where($data)->count();

		if($result < 1){
			return Model_akses_menu::create($data);
		}else{
            // return $queryy = $builder->delete($data);
            return Model_akses_menu::where($data)->delete();
		}

        // return redirect('/role');
        //$this->session->setFlashdata('pesan_akses', 'Role akses berhasil diubah!');
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

    public function hup(Request $request){
         // $this->model->UbahRole($menu_id, $role_id);
         $menu_id = $request->menuId;
         $role_id = $request->roleId;
 
         $data = [
             'role_id' => $role_id,
             'menu_id' => $menu_id
         ];
         $result = Model_akses_menu::where($data)->count();
 
         if($result < 1){
             Model_akses_menu::create($data);
         }else{
             // return $queryy = $builder->delete($data);
             Model_akses_menu::delete($data);
         }
 
         return redirect('/role');
    }
}
