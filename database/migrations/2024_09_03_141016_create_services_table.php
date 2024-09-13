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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('short_description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('content')->nullable();
            $table->longText('category')->nullable();
            $table->longText('sub_category')->nullable();
            $table->tinyInteger('status')->default(1)->comment(
                '1 = published,
                2 = unpublished,
                3 = deleted,
                '
            );
            $table->longText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
