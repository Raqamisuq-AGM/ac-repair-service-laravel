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
        Schema::create('system_images', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('system_images');
    }
};
