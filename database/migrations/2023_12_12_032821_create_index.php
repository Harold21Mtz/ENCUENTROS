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
        Schema::create('index', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('description_one');
            $table->mediumText('description_two');
            $table->string('ufpso_student', '30');
            $table->string('ufpso_graduate', '30');
            $table->string('external_professional', '30');
            $table->string('oral_presenter', '30');
            $table->mediumText('description_three');
            $table->mediumText('message');
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
        Schema::dropIfExists('index');
    }
};
