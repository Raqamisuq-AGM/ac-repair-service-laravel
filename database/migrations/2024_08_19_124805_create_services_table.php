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
            $table->longText('title')->nullable();
            $table->string('short_title')->nullable();
            $table->string('slug')->nullable();
            $table->string('icon')->nullable();
            $table->string('short_icon')->nullable();
            $table->string('position')->nullable();
            $table->string('cover_photo')->nullable();
            $table->longText('desc')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('category')->nullable();
            $table->longText('sub_category')->nullable();
            $table->longText('tags')->nullable();
            $table->longText('meta_title')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_desc')->nullable();
            $table->longText('meta_author')->nullable();
            $table->longText('meta_tags')->nullable();
            $table->longText('meta_og_thumb')->nullable();
            $table->boolean('status')
                ->default('0')
                ->comment('
                    0 = inactive,
                    1 = active,
                    2 = deleted
                ');
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
