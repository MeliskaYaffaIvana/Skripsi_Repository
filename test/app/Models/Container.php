<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    public $table = 'container';
    protected $primaryKey = 'id_container';
    public $timestamps = false;
    protected $fillable = [
        'judul',
        'deksripsi',
        'frontend',
        'backend',
        'database',
        'id_user',
    ];
}
