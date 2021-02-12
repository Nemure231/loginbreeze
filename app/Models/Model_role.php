<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//untuk memanggil fungsi soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Model_role extends Model
{
    use SoftDeletes;
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    protected $fillable = ['nama_role'];
}
