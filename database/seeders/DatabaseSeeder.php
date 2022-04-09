<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model_menu;
use App\Models\Model_role;
use App\Models\Model_submenu;
use App\Models\Model_akses_menu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /////MENU/////
        Model_menu::create([
            'id_menu' => 1,
            'nama_menu' => 'Role',          
        ]);

        Model_menu::create([
            'id_menu' => 2,
            'nama_menu' => 'Barang',          
        ]);

        Model_menu::create([
            'id_menu' => 2,
            'nama_menu' => 'Menu',          
        ]);

        ///ROLE///
        Model_role::create([
            'id_role' => 1,
            'nama_role' => 'Admin',          
        ]);

        Model_role::create([
            'id_role' => 2,
            'nama_role' => 'Pengguna',          
        ]);

        ///SUBMENU////

        Model_submenu::create([
            'menu_id' => 2,
            'nama_submenu' => 'Barang',
            'url_submenu' => '/barang',          
            'status_submenu' => 1
        ]);

        Model_submenu::create([
            'menu_id' => 3,
            'nama_submenu' => 'Menu',
            'url_submenu' => '/menu',          
            'status_submenu' => 1
        ]);

        Model_submenu::create([
            'menu_id' => 1,
            'nama_submenu' => 'Daftar Role',
            'url_submenu' => '/role',          
            'status_submenu' => 1
        ]);

        Model_submenu::create([
            'menu_id' => 3,
            'nama_submenu' => 'Daftar Submenu',
            'url_submenu' => '/menu/submenu',          
            'status_submenu' => 1
        ]);

        ///AKSES MENU////
        Model_akses_menu::create([
            'menu_id' => 1,
            'role_id' => 1          
        ]);

        Model_akses_menu::create([
            'menu_id' => 2,
            'role_id' => 1          
        ]);

        Model_akses_menu::create([
            'menu_id' => 3,
            'role_id' => 1          
        ]);




        // \App\Models\User::factory(10)->create();
        // DB::table('akses_menu')->insert(
        //     [
        //         'menu_id' => 1,
        //         'role_id' => 1
        //     ],
        //     [
        //         'menu_id' => 2,
        //         'role_id' => 1
        //     ],
        //     [
        //         'menu_id' => 3,
        //         'role_id' => 1
        //     ]
            
        // );


        // DB::table('role')->insert(
        //     [   
        //         'nama_role' => 'Admin'
        //     ],
        //     [
                
        //         'nama_role' => 'Pengguna'
        //     ],
            
            
        // );
    }
}
