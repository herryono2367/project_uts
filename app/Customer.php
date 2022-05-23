<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =['nama','kode','harga', 'merek','warna','tipe'];
}
