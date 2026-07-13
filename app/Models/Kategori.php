<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kategori'];

    use SoftDeletes;

    public function barang() {
        return $this->hasMany(Barang::class);
    }
}


