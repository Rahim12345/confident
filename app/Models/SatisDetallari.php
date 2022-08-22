<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatisDetallari extends Model
{
    use HasFactory;

    protected $table = 'satis_detallaris';

    protected $guarded = [];

    public function mehsul()
    {
        return $this->hasOne(Mehsul::class,'id','mehsul_id');
    }

    public function satis()
    {
        return $this->hasOne(Satis::class,'id','satis_id');
    }
}
