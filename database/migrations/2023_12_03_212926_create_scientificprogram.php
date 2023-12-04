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
        Schema::create('scientificprogram', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_program', '50');
            $table->string('date_presentation', '50');
            $table->string('hour_presentation', '300');
            $table->mediumText('activity');
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
        Schema::dropIfExists('scientificprogram');
    }
};
