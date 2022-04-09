<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_merek extends Model
{
    protected $table = 'merek';
    protected $primaryKey = 'id_merek';
    protected $fillable = ['nama_merek'];
}
