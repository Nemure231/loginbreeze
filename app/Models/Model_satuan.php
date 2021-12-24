<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_satuan extends Model
{
    protected $table = 'satuan';
    protected $primaryKey = 'id_satuan';
    protected $fillable = ['nama_satuan'];
    public $timestamps = false;

}
