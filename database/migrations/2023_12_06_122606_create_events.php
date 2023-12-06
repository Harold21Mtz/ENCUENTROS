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
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_title', '50');
            $table->mediumText('event_description_one');
            $table->mediumText('event_description_two');
            $table->mediumText('event_image');
            $table->mediumText('event_image_one')->nullable();
            $table->mediumText('event_image_two')->nullable();
            $table->mediumText('event_image_three')->nullable();
            $table->mediumText('event_image_four')->nullable();
            $table->mediumText('event_image_five')->nullable();
            $table->mediumText('event_image_six')->nullable();
            $table->mediumText('event_image_seven')->nullable();
            $table->mediumText('event_image_eight')->nullable();
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
        Schema::dropIfExists('events');
    }
};
