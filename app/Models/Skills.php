<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'table_skills';

    protected $fillable = [
        'id_user',
        'name_skills',
    ];
}
