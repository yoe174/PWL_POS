<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

// class UserModel extends Model
class UserModel extends Authenticatable implements JWTSubject
{
    // use HasFactory;
    use Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getkey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    
    // protected $fillable = ['level_id','username','nama','password'];
    // D JS.6
    protected $fillable = [
        'user_id',
        'level_id',
        'username',
        'nama',
        'password'
    ];
    
    public function level() : BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id','level_id');
    }
}
