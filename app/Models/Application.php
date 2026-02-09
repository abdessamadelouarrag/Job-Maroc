<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'table_my_offer';

    protected $fillable = ['id_user', 'id_offre', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class, 'id_offre');
    }
}
