<?php

use App\Models\Model_akses_menu;

    
        function check_akses($role_id, $menu_id){
    
            $result = Model_akses_menu::select('role_id', 'menu_id')
            ->where(['role_id' => $role_id, 'menu_id' => $menu_id])
            ->count();

            if ($result > 0) {
                return 'checked="checked"';
            }
        }


?>