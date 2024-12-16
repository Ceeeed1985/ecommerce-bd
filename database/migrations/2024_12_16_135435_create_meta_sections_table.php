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
        Schema::create('meta_sections', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title_home');
            $table->mediumText('meta_keyword_home');
            $table->mediumText('meta_description_home');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_sections');
    }
};
