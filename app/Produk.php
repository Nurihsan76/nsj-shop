<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['kategori_id', 'user_id', 'nama', 'merek', 'harga', 'descripsi_singkat', 'descripsi_lengkap', 'foto', 'sembunyikan_produk'];

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    
    // public function getHargaAttribute()
    // {
    //     // return $this->attributes['kredit'] = sprintf(number_format($kredit, 2));
    //     return number_format($this->attributes['harga'], 2, ',', '.');    
    // }

}
