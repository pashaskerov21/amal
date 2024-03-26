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
        Schema::create('setting_translates', function (Blueprint $table) {
            $table->id();
            $table->integer('setting_id');
            $table->string('lang');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('author')->nullable();
            $table->text('keywords')->nullable();
            $table->text('copyright')->nullable();
            $table->text('address_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_translates');
    }
};
