<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mkeranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $fillable = [
        'id',
        'UserID',
        'judul',
        'foto',
        'keterangan',
    ];
}
