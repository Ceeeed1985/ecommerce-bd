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
        Schema::create('product_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('total_featured_product_home');
            $table->integer('total_latest_product_home');
            $table->integer('total_popular_product_home');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_settings');
    }
};
