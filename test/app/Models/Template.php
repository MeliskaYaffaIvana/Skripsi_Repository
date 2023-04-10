<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    public $table = 'template';
    protected $primaryKey = 'id_template';
    public $timestamps = false;
    protected $fillable = [
        'id_kat',
        'tipe_template',
        'versi',
        'status_template',
    ];
    public function container(){
        return $this->hasMany('App\Models\Container');
    }
}
