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
            $table->string('description_one', '500');
            $table->string('description_two', '500');
            $table->string('ufpso_student', '20');
            $table->string('ufpso_graduate', '20');
            $table->string('external_professional', '20');
            $table->string('oral_presenter', '20');
            $table->string('description_three', '120');
            $table->string('message', '80');
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
