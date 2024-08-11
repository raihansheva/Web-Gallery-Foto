<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mAlbum extends Model
{
    use HasFactory;

    protected $table = 'album';

    protected $primaryKey = 'AlbumID';
    protected $fillable = [
        'AlbumID',
        'NamaAlbum',
        'Deskripsi',
        'UserID',
    ];
}
