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
        Schema::create('organizingcommitee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('organizer_charge', '50');
            $table->string('organizer_name', '200');
            $table->string('organizer_title', '20');
            $table->string('organizer_university', '100');
            $table->mediumText('organizer_description');
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
        Schema::dropIfExists('organizingcommitee');
    }
};
