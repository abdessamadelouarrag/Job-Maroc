<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    protected $table = 'table_experiences';

    protected $fillable = [
        'id_user',
        'name_of_experiences',
        'city',
        'date_start',
        'date_end',
    ];
}
