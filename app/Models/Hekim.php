<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hekim extends Model
{
    use HasFactory;

    protected $table = 'hekims';

    protected $guarded = [];

    public function klinika()
    {
        return $this->hasOne(Klinika::class,'id','klinika_id');
    }
}
