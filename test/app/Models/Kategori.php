<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Kategori extends Model
{
    use HasFactory;
    public $table = 'kategori';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'kategori',
    ];

    
    public static function boot(){
        parent::boot();

        static::creating(function ($model){
            $model->id = IdGenerator::generate(['table' => 'kategori', 'length' => 5, 'prefix' =>'KT']);
    });
}
    public function template(){
        return $this->hasMany('App\Models\Template');
    }
}
