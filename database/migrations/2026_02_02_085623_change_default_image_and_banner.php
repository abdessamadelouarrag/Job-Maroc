<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image_url')
                ->default('app\public\profiles\avatars\krW8CvyIC06jUXS5f5Jx9CppjUuqRoI3LmfZ2BAF.jpg')
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image_url')
                ->default('app\public\profiles\avatars\krW8CvyIC06jUXS5f5Jx9CppjUuqRoI3LmfZ2BAF.jpg')
                ->change();
        });
    }
};
