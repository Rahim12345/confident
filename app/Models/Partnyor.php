<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnyor extends Model
{
    use HasFactory;

    protected $table = 'partnyors';

    protected $guarded = [];

    public function mehsuls()
    {
        return $this->hasMany(Mehsul::class,'firma_id','id');
    }
}
