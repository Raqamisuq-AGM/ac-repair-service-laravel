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
        Schema::create('system_infos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slogan')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longText('about')->nullable();
            $table->longText('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('avatar')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('dribble')->nullable();
            $table->string('github')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('wechat')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->string('skype')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tubmlr')->nullable();
            $table->string('medium')->nullable();
            $table->string('twitch')->nullable();
            $table->string('threads')->nullable();
            $table->string('discord')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_tags')->nullable();
            $table->string('og_thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_infos');
    }
};
