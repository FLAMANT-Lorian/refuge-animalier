<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animals')->cascadeOnDelete();
            $table->string('full_name');
            $table->string('email');
            $table->string('message');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('housing')->nullable();
            $table->boolean('outdoor_area')->nullable();
            $table->boolean('children_at_home')->nullable();
            $table->integer('children_count')->nullable();
            $table->boolean('animals_at_home')->nullable();
            $table->string('animals_type')->nullable();
            $table->string('status');
            $table->string('rejection_message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adoption_requests');
    }
};
