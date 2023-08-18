<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

public function up()
{
    Schema::create('professor_discipline', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('professor_id');
        $table->unsignedBigInteger('discipline_id');
        $table->timestamps();

        $table->foreign('professor_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('discipline_id')->references('id')->on('disciplines')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor_discipline');
    }
};
