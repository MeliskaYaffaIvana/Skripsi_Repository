<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Template extends Model
{
    use HasFactory;
    public $table = 'template';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id_kategori',
        'id_user',
        'nama_template',
        'versi',
        'link_template',
        'bolehkan',
        'status_job',
        'tgl_dibuat',
        'tgl_selesai',
    ];
    
    // const active_bolehkan = 1;
    // const inactive_bolehkan =0;

    // public function bolehkanActive(){
    //     return $this->bolehkan === self::active_bolehkan;
    // }

    // public function bolehkanInactive(){
    //     return $this->bolehkan === self::inactive_bolehkan;
    // }

    // const active_status = 1;
    // const inactive_status =0;

    // public function statusActive(){
    //     return $this->status_job === self::active_status;
    // }

    // public function statusInactive(){
    //     return $this->status_job === self::inactive_status;
    // }

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->tgl_dibuat = Carbon::now();
            $model->tgl_selesai = Carbon::now()->addDays(1);
            $model->id = date('YmdHis');
            // $model->id = IdGenerator::generate([
            //     'table' => 'template',
            //     'length' => 18,
            //     'prefix' => 'TP' . date('YmdHis'),
            //     'reset_on_prefix_change' => false,
            // ]);
         });
    }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         // generate id dengan format waktu ditambah sequence
    //         $id = 'MYC-' . Carbon::now()->format('Ymd-His-');
    //         $max = DB::template($model->Template())->where('id', 'like', $id . '%')->max('id');

    //         $model->id = $max ? $id . str_pad(intval(substr($max, -2)) + 1, 2, '0', STR_PAD_LEFT) : $id . '01';
    //     });
    // }
    public function kategori(){
        return $this->belongsTo('App\Models\Kategori');
    }
    public function container(){
        return $this->hasMany('App\Models\Container');
    }
}
