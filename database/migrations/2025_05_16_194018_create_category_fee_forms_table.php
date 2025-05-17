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
        Schema::create('category_fee_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_category_id')->references('id')->on('fee_categories')->cascadeOnDelete();
            $table->foreignId('fee_id')->references('id')->on('fees')->cascadeOnDelete();
            $table->foreignId('form_id')->references('id')->on('forms')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_fee_forms');
    }
};
