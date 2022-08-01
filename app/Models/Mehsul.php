<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mehsul extends Model
{
    use HasFactory;

    protected $table    = 'mehsuls';
    protected $guarded  = [];

    public function firma()
    {
        return $this->hasOne(Partnyor::class,'id','firma_id');
    }

    public function istehsalci()
    {
        return $this->hasOne(Istehsalci::class,'id','istehsalci_id');
    }

    public function kateqoriya()
    {
        return $this->hasOne(Kateqoriya::class,'id','kateqoriya_id');
    }

    public function marka()
    {
        return $this->hasOne(Marka::class,'id','marka_id');
    }

    public function vahid()
    {
        return $this->hasOne(Vahid::class,'id','vahid_id');
    }

    public function satis_details()
    {
        return $this->hasMany(SatisDetallari::class,'mehsul_id','id');
    }
}
