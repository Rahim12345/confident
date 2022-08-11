<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSatisDetallari extends Model
{
    use HasFactory;

    protected $table = 'log_satis_detallaris';

    protected $guarded = [];

    public function mehsul()
    {
        return $this->hasOne(Mehsul::class,'id','mehsul_id');
    }
}
