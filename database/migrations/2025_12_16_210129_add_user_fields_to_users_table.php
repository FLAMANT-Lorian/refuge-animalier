<?php

use App\Enums\UserStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar_path')->after('email')->nullable();
            $table->string('address')->after('avatar_path')->nullable();
            $table->integer('postal_code')->after('address')->nullable();
            $table->json('notifications')->after('postal_code')->nullable();
            $table->json('availability')->after('notifications')->nullable();
            $table->string('status')->after('availability');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'avatar_path',
                'address',
                'postal_code',
                'notifications',
                'availability',
                'status',
            ]);
        });
    }
};
