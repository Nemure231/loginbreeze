<?php

use App\Models\Model_akses_menu;
use App\Models\Model_menu;
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


?>