<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['kategori', 'user_id'];
    
    public function produks(){
        return $this->hasMany(Produk::class);
       }
}
