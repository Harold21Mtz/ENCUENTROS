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
        Schema::create('slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('conference_name', '70');
            $table->string('conference_date', '30');
            $table->string('university_name', '70');
            $table->string('faculty_name', '60');
            $table->mediumText('conference_logo');
            $table->mediumText('conference_image');
            $table->mediumText('conference_image_secondary_one')->nullable();
            $table->mediumText('conference_image_secondary_two')->nullable();
            $table->mediumText('conference_image_secondary_three')->nullable();
            $table->mediumText('conference_image_secondary_four')->nullable();
            $table->mediumText('conference_image_secondary_five')->nullable();
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
        Schema::dropIfExists('slides');
    }
};
