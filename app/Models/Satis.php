<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satis extends Model
{
    use HasFactory;

    protected $table = 'satis';

    protected $guarded = [];

    public function satis_usulu()
    {
        return $this->hasOne(SatisUsulu::class,'id','satis_usulu_id');
    }

    public function satici()
    {
        return $this->hasOne(User::class,'id','satici_id');
    }

    public function details()
    {
        return $this->hasMany(SatisDetallari::class,'satis_id','id');
    }

    public function hisse_cedvels()
    {
        return $this->hasMany(HisseCedvel::class,'satis_id','id');
    }
}
