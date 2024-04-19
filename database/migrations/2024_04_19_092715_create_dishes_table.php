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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('img');
            $table->decimal('price', 8, 2);
            $table->string('weight');
            $table->string('amount');
            $table->tinyInteger('spicy');
            $table->integer('sort');
            $table->tinyInteger('active');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->unsignedBigInteger('weight_unit_id');
            $table->foreign('weight_unit_id')->references('id')->on('units');
            $table->unsignedBigInteger('amount_unit_id');
            $table->foreign('amount_unit_id')->references('id')->on('units');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
