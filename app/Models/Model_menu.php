<?php

namespace App\Models;
// use App\Models\Model_akses_menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = ['nama_menu'];
    public $timestamps = false;

    // public function akses_menu()
    // {
    //     return $this->hasMany(Model_akses_menu::class, 'menu_id', 'id_menu');
    // }


}
