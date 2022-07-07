<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HekimVezife extends Model
{
    use HasFactory;

    protected $table = 'hekim_vezives';

    protected $guarded = [];
}
