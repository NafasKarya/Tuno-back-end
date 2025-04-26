<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes; // 🔥 Tambahkan SoftDeletes

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes; // 🔥 Tambahkan trait SoftDeletes

    protected $fillable = [
        'user_id',
        'username',
        'email',
        'password',
        'phone',
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'deleted_at', // 🔥 Tambahkan supaya field deleted_at dibaca sebagai Carbon date
    ];

    // JWT implementation
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
