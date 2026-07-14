<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama_barang', 'harga', 'stok', 'kategori_id'];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }


    protected static function boot() {
    parent::boot();

    static::creating(function ($barang) {

        $inisial = collect(explode(' ', $barang->nama_barang))
        ->map(function ($kata) {
        return strtoupper(substr($kata, 0, 1));
        })
        ->join('');

        $tanggal = now()->format('dmy');

        $lastBarang = Barang::withTrashed()->latest('id')->first();

        $counter = $lastBarang ? $lastBarang->id + 1 : 1;

        $barang->kode_barang =
            'BRG' . $inisial . $tanggal . str_pad($counter, 3, '0', STR_PAD_LEFT);
    });
}
}
