<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Offre extends Model
    {
        protected $table = 'table_offre';

        protected $fillable = [
            'title',
            'place',
            'image_offer',
            'type_offer',
            'description',
        ];
    }
