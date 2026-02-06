<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;


    class Offre extends Model
    {

        use HasFactory;

        protected $table = 'table_offre';

        protected $fillable = [
            'title',
            'place',
            'image_offer',
            'type_offer',
            'description',
        ];
    }
