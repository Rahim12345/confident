<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinika extends Model
{
    use HasFactory;

    protected $table = 'klinikas';

    protected $guarded = [];

    public function rayon()
    {
        return $this->hasOne(Rayon::class,'id','rayon_id');
    }
}
