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
        Schema::create('scientificcommiteei', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('scientific_name', '200');
            $table->string('scientific_title', '20');
            $table->string('scientific_university', '100');
            $table->mediumText('scientific_description');
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
        Schema::dropIfExists('scientificcommiteei');
    }
};
