<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Container extends Model
{
    use HasFactory;
    public $table = 'container';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_template',
        'nama_kontainer',
        'bolehkan',
        'status_job',
        'tgl_dibuat',
        'status',
        'port_kontainer',
        'env_kontainer',
    ];
    public static function generateCustomID(){
        $prefix = 'CT';
        $date = Carbon::now('Asia/Jakarta')->format('YmdHis');
        $sequence = self::generateSequence();

        return $prefix . $date . $sequence;
    }
    protected static function generateSequence(){
        $lastID = DB::table('container')
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
            $lastID = $newID;
        }
        
        return $lastID;
    }

    public static function boot(){
        parent::boot();

        // Validasi saat menyimpan data baru
        static::creating(function ($container) {
            $user = User::find($container->id_user);
            $kategori = $container->template->id_kategori;

            // Cek apakah pengguna sudah memiliki entri kontainer untuk kategori template yang dipilih
            $existingContainer = Container::where('id_user', $user->id)
                ->whereHas('template', function ($query) use ($kategori) {
                    $query->where('id_kategori', $kategori);
                })->first();

            if ($existingContainer) {
                // Jika pengguna sudah memiliki entri kontainer untuk kategori template ini,
                // set the error message in the session
                session()->flash('error', 'Anda sudah memiliki kontainer untuk kategori template ini.');

                // Batalkan proses menyimpan data baru
                return false;
            }
        });
        static::creating(function($model){
            $model->tgl_dibuat = Carbon::now('Asia/Jakarta');
            $model->id = self::generateCustomID();
         });
         static::saving(function ($container) {
            if ($container->status_job == 2 && empty($container->tgl_selesai)) {
                $container->tgl_selesai = Carbon::now('Asia/Jakarta')->toDateString();
            }
        });
        }
    public function template(){
        return $this->belongsTo(Template::class, 'id_template');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}