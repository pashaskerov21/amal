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
        Schema::create('blog_translates', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_id');
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('date')->nullable();
            $table->text('text')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('lang');
            $table->integer('destroy')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_translates');
    }
};
