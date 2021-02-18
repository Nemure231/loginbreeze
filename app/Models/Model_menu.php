<?php

namespace App\Models;
// use App\Models\Model_akses_menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = ['nama_menu', 'model_menu'];


    // public function roles()
    // {
    //     // return $this->belongsToMany(Role::class);

    //     return $this->belongsToMany(Model_akses_menu::class, 'akses_menu', 'menu_id', 'role_id');
    // }
}
