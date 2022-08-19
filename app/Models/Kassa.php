<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kassa extends Model
{
    use HasFactory;

    protected $table = 'kassas';

    protected $guarded = [];

    public function operation()
    {
        return $this->hasOne(Operation::class,'id','operation_id');
    }

    public function satici()
    {
        return $this->hasOne(User::class,'id','satici_id');
    }
}
