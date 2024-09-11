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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('thumbnail')->nullable();
            $table->longText('short_desc')->nullable();
            $table->longText('raqamisuq_email')->nullable();
            $table->longText('raqamisuq_license_code')->nullable();
            $table->tinyInteger('status')->default(0)->comment(
                '1 = active,
                0 = inactive'
            );
            $table->tinyInteger('verified')->default(0)->comment(
                '1 = verified,
                0 = unverified'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
