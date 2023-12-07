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
        Schema::create('speakers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('speaker_name', '200');
            $table->string('speaker_title', '20');
            $table->string('speaker_presentation', '300');
            $table->mediumText('speaker_description');
            $table->string('speaker_university', '100');
            $table->mediumText('speaker_profile')->nullable();
            $table->mediumText('speaker_image_country')->nullable();
            $table->string('status');
            $table->string('registerBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};
