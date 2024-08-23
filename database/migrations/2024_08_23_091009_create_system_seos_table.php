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
        Schema::create('system_seos', function (Blueprint $table) {
            $table->id();
            $table->longText('meta_title')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_desc')->nullable();
            $table->longText('meta_author')->nullable();
            $table->longText('meta_og_thumb')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_seos');
    }
};
