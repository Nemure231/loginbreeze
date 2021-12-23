<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_submenu extends Model
{
    protected $table = 'submenu';
    protected $primaryKey = 'id_submenu';
    protected $fillable = ['nama_submenu', 'menu_id', 'status_submenu', 'url_submenu'];
}
