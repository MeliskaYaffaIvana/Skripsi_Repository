<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Container extends Model
{
    use HasFactory;
    public $table = 'container';
    protected $primaryKey = 'id_container';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_template',
        'nama_kontainer',
        'bolehkan',
        'status_job',
        'tgl_dibuat',
    ];
    public function idGenerate(){
    $this->db->select_max('id');    
		$qry = $this->db->get($this->container);
		if($qry){
			$rawRes = $qry->result_array();
			$lastID = $rawRes[0]['id'];
			if($lastID == ''){
				$lastID = '00';
			}
			$lastID = substr($lastID, 4,2);
			$lastID = (int)$lastID;
			$newID = $lastID+1;
			$lenID = strlen($newID);
			for($i=0; $i<(2-$lenID);$i++){
				$newID = '0'.$newID;
			}
        }
    }
    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->tgl_dibuat = Carbon::now();
            $model->tgl_selesai = Carbon::now()->addDays(1);
            // $model->id = date('YmdHis');
        //     $model->id = IdGenerator::generate([
        //         'table' => 'template',
        //         'length' => 20,
        //         'prefix' => 'TP-' . date('YmdHis'),
        //         'reset_on_prefix_change' => false,
        //     ]);
         });
        }
    public function template(){
        return $this->belongsTo('App\Models\Template');
    }
}
