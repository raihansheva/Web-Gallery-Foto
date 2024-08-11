<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mKomen extends Model
{
    use HasFactory;

    protected $table = 'komentarfoto';

    protected $primaryKey = 'KomentarID';
    protected $fillable = [
        'FotoID',
        'UserID',
        'IsiKomentar',
        'TanggalKomentar',
    ];

    public function foto()
    {
        return $this->hasmany(mPoto::class, 'FotoID', 'FotoID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }
}
