<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyOffre extends Model
{
    protected $table = 'table_my_offer';

    protected $fillable = ['id_user', 'id_offre', 'status'];
}
