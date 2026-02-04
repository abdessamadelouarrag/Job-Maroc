<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('table_skills', function (Blueprint $table) {
            $table->dropColumn(['date_start', 'date_end']);
        });
    }

    public function down(): void
    {
        Schema::table('table_skills', function (Blueprint $table) {
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
        });
    }
};
