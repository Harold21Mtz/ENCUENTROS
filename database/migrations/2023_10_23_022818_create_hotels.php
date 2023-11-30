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
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hotel_name', '50');
            $table->mediumText('hotel_description');
            $table->string('hotel_contact_number', '20')->nullable();
            $table->string('hotel_contact_email', '50')->nullable();
            $table->mediumText('hotel_image');
            $table->mediumText('hotel_image_secondary_one')->nullable();
            $table->mediumText('hotel_image_secondary_two')->nullable();
            $table->mediumText('hotel_image_secondary_three')->nullable();
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
        Schema::dropIfExists('hotels');
    }
};
