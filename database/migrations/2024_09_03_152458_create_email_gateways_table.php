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
        Schema::create('email_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('driver')->nullable();
            $table->longText('host')->nullable();
            $table->longText('port')->nullable();
            $table->longText('username')->nullable();
            $table->longText('password')->nullable();
            $table->longText('encryption')->nullable();
            $table->longText('from_name')->nullable();
            $table->longText('from_address')->nullable();
            $table->tinyInteger('status')->default(0)->comment(
                '
                0 = inactive,
                1 = active,
                2 = deleted,
                '
            );
            $table->tinyInteger('is_default')->default(0)->comment(
                '
                0 = no,
                1 = yes,
                '
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_gateways');
    }
};
