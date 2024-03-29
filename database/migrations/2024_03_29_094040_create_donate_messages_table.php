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
        Schema::create('donate_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id')->default(0);
            $table->text('fullname')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('amount')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donate_messages');
    }
};
