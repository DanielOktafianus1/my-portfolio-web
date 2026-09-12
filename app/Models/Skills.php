<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $fillable = [
        'user_id',
        'skillImg',
        'skillName',
        'subSkill',
        'skillProgress',
        'skillDesc',
    ];
}
