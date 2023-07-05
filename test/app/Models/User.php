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
        'terdaftar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rules()
    {
        return [
            'nim' => 'required|unique:users,nim',
            // tambahkan aturan validasi lainnya
        ];
    }
    
    public static function getIdFromNim($nim)
{
    $hash = md5($nim);
    $id = substr($hash, 0, 50);
    return $id;
}
protected static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        // Mendapatkan ID dari NIM menggunakan fungsi getIdFromNim()
        $id = static::getIdFromNim($user->nim);

        // Mengatur nilai ID pengguna sebelum disimpan
        $user->id = $id;
    });
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