<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formations extends Model
{
    protected $table = 'table_formations';
    public $timestamps = false;


    protected $fillable = [
        'id_user',
        'name_of_formation',
        'date_start',
        'date_end',
    ];
}
