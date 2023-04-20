<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'nim',
        'nama',
        'judul',
        'deskripsi',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected static function booted(){
    //     static::creating(function ($users){
    //         $users->nim = Crypt::encrypt($users->nim);
    //         $users->id = strtoupper(substr(md5($users->nim), 0, 10));
    //     });
    // }
    
    public static function getIdFromNim($nim)
{
    $hash = md5($nim);
    $id = substr($hash, 0, 50);
    return $id;
}
public function Template(){
        return $this->hasMany('App\Models\Template');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
