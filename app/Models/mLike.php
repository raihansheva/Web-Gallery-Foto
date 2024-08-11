<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mLike extends Model
{
    use HasFactory;

    protected $table = 'likefoto';

    protected $primaryKey = 'LikeID';
    protected $fillable = [
        'LikeID',
        'FotoID',
        'UserID',
        'TanggalLike',
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
