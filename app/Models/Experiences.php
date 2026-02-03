<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    protected $table = 'table_experiences';
    public $timestamps = false;


    protected $fillable = [
        'id_user',
        'name_of_experience',
        'city',
        'date_start',
        'date_end',
    ];
}
