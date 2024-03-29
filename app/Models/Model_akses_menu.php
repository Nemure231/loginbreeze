<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_akses_menu extends Model
{
    protected $table = 'akses_menu';
    protected $primaryKey = 'id_akses_menu';
    protected $fillable = ['menu_id', 'role_id'];
    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo(Model_menu::class, 'menu_id', 'id_menu');
    }
}
