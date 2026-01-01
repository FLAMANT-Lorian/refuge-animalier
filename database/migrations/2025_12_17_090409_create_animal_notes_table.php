<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('animal_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animals')->cascadeOnDelete();
            $table->string('full_name');
            $table->string('email');
            $table->string('note');
            $table->timestamp('visit_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_notes');
    }
};
