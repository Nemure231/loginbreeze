<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidasiRole;
use App\Http\Requests\ValidasiEditRole;
use App\Models\Model_role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $role =  Model_role::select('id_role', 'nama_role')
                                ->get(); 

        return view('role/daftar_role',
            ['role' => $role]
            
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
    public function store(ValidasiRole $request)
    {
        $validated = $request->validated();

        Model_role::create([
           'nama_role' => $request->nama_role,

       ]);
       return redirect('/role')
       ->with('pesan_role', 'Data role berhasil ditambahkan!');
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
    public function update(ValidasiEditRole $request, Model_role $role)
    {
        $validated = $request->validated();
        
        Model_role::where('id_role', $role->id_role)
                    ->update([
                        //yang kiri dari database //dan yang kanan dari name form input
                        'nama_role' => $request->e_nama_role
                    ]);
        // dd($barang->id_barang);
                        
        return redirect('/role')->with('pesan_role', 'Data role berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_role $role)
    {
        Model_role::destroy($role->id_role);
        return redirect('/role')->with('pesan_role', 'Data role berhasil dihapus!');
    }
}
