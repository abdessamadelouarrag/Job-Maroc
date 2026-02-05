<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_offre', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('place');
            $table->string('type_offer');
            $table->text('description');
            $table->timestamps();
            $table->string('image_offer');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_offre');
    }
};
