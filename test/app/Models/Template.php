<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use DB;

class Template extends Model
{
    use HasFactory;
    public $table = 'template';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id_kategori',
        'id_user',
        'nama_template',
        'versi',
        'link_template',
        'default_dir',
        'bolehkan',
        'status_job',
        'tgl_dibuat',
        'tgl_selesai',
    ];
    
    public static function generateCustomID(){
        $prefix = 'TP';
        $date = Carbon::now('Asia/Jakarta')->format('YmdHis');
        $sequence = self::generateSequence();

        return $prefix . $date . $sequence;
    }
    protected static function generateSequence(){
        $lastID = DB::table('template')
            ->select(DB::raw('SUBSTRING(id, 18,2) AS last_sequence'))
            ->orderBy('id', 'desc')
            ->limit(1)
            ->value('last_sequence');

        if($lastID == ''){
            $lastID = '00';
        }else{
            $lastID = (int) $lastID;
            $newID = $lastID + 1;
            $newID = str_pad($newID, 2, '0', STR_PAD_LEFT);
            // $lenID = $strlen($newID);
            // for($i=0; $i<(2-$lenID); $i++){
            //     $newID = '0'.$newID;
            // }
            $lastID = $newID;
        }
        
        return $lastID;
    }

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->tgl_dibuat = Carbon::now('Asia/Jakarta');
            // $model->tgl_selesai = Carbon::now('Asia/Jakarta')->addDays(1);
            $model->id = self::generateCustomID();

            // $model->id = date('YmdHis');
            // $model->id = IdGenerator::generate([
            //     'table' => 'template',
            //     'length' => 18,
            //     'prefix' => 'TP' . date('YmdHis'),
            //     'reset_on_prefix_change' => false,
            // ]);
         });
         static::saving(function ($template) {
            if ($template->status_job == 2 && empty($template->tgl_selesai)) {
                $template->tgl_selesai = Carbon::now('Asia/Jakarta')->toDateString();
            }
        });
    }

    public function kategori(){
        return $this->belongsTo('App\Models\Kategori');
    }
    public function container(){
        return $this->hasMany('App\Models\Container');
    }
}