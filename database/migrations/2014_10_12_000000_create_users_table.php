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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_profile', '20');
            $table->mediumText('user_image');
            $table->boolean('user_status');
            $table->string('name', '100');
            $table->string('email', '100')->unique();
            $table->string('password', '100');
            $table->timestamp('password_created_or_updated_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('user_session_attempts')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
