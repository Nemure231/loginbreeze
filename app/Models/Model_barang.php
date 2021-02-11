<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//untuk memanggil fungsi soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Model_barang extends Model
{
    use SoftDeletes;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama_barang', 'satuan_id', 'merek_id', 'harga_barang'];
}
