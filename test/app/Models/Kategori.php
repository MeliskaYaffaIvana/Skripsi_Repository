<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    public $table = 'kategori';
    protected $primaryKey = 'id_kat';
    public $timestamps = false;
    protected $fillable = [
        'nama_kat',
    ];
    public function template(){
        return $this->hasMany('App\Models\Template');
    }
}
