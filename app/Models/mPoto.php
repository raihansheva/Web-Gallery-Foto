<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mPoto extends Model
{
    use HasFactory;

    protected $table = 'foto';

    protected $primaryKey = 'FotoID';
    protected $fillable = [
        'FotoID',
        'JudulFoto',
        'DeskripsiFoto',
        'TanggalUnggah',
        'LokasiFile',
        'AlbumID',
        'UserID',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }

    public function album()
    {
        return $this->belongsTo(mAlbum::class, 'AlbumID', 'AlbumID');
    }

    public function komentar()
    {
        return $this->hasMany(mKomen::class, 'FotoID');
    }

    public function like()
    {
        return $this->hasMany(mLike::class, 'FotoID');
    }
}
