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
        Schema::disableForeignKeyConstraints();

        Schema::create('lesson_plan_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_plan_id');
            $table->foreign('lesson_plan_id')->references('id')->on('lesson_plans');
            $table->string('objective');
            $table->string('activity');
            $table->string('resources');
            $table->string('assessment');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_plan_items');
    }
};
