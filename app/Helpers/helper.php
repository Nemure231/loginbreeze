<?php

use App\Models\Model_akses_menu;
use App\Models\Model_menu;
use App\Models\Model_submenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
    
        function check_akses($role_id, $menu_id){
    
            $result = Model_akses_menu::select('role_id', 'menu_id')
            ->where(['role_id' => $role_id, 'menu_id' => $menu_id])
            ->count();

            if ($result > 0) {
                return 'checked="checked"';
            }
        }


       function is_logged_in(){

          
            // if (!$role) {

            // return redirect('');


            // }else{
                $request = request();
                $role = Auth::user()->role_id;
                $menu = $request->segment(1);

            
    
                $queryMenu= Model_menu::select('id_menu')
                            ->where('nama_menu', $menu)
                            ->first();
                            
                $menu_id = $queryMenu['id_menu'];
    
                return $access= Model_akses_menu::select('role_id', 'menu_id')
                        ->where([
                            'role_id' => $role,
                            'menu_id' => $menu_id
                        ])->count();
                // dd($access);
    
    
    
            // }
    
    
        }

        function ambil_menu(){

            $role = Auth::user()->role_id;

            $menu = Model_menu::join('akses_menu', 'menu.id_menu', '=', 'akses_menu.menu_id')
                        ->where('akses_menu.role_id', $role)
                        ->orderBy('akses_menu.menu_id', 'asc')
                        ->orderBy('akses_menu.role_id', 'asc')
                        ->select('id_menu', 'nama_menu', 'route_menu')
                        ->get();
            return $menu;
        }

        function ambil_submenu($id_menu){
            $submenu =  Model_submenu::join('menu', 'submenu.menu_id', '=', 'menu.id_menu')
            ->where('submenu.menu_id', $id_menu)
                        ->where('submenu.status_submenu', 1)
                        ->select('nama_submenu', 'id_submenu', 'url_submenu')
                        ->get();

            return $submenu;
            
        }


?>