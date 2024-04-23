<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class UserModel extends Model
class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

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
