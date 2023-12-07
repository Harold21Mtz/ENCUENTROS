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
        Schema::create('workshopparticipants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('participant_name', '50');
            $table->string('participant_title', '20');
            $table->string('participant_presentation', '300');
            $table->mediumText('participant_description');
            $table->string('participant_university', '100');
            $table->mediumText('participant_profile')->nullable();
            $table->mediumText('participant_image_country')->nullable();
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
        Schema::dropIfExists('workshopparticipants');
    }
};
