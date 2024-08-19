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
        Schema::create('frontend_sections', function (Blueprint $table) {
            $table->id();
            $table->longText('page')->nullable();
            $table->longText('section')->nullable();
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('frontend_sections');
    }
};
