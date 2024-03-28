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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->float('current_amount')->default(0);
            $table->float('final_amount')->default(0);
            $table->float('percent')->default(0);
            $table->string('card_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->integer('order');
            $table->integer('destroy')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
