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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('breed_id')->constrained('breeds')->cascadeOnDelete();
            $table->string('coat');
            $table->string('vaccines')->nullable();
            $table->string('description');
            $table->string('sex');
            $table->timestamp('birth_date');
            $table->string('state');
            $table->string('img_path');
            $table->timestamp('adopted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
