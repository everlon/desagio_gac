<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
     {
         Schema::create('transactions', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('sender_id')->nullable();
             $table->unsignedBigInteger('receiver_id')->nullable();
             $table->decimal('amount', 15, 2);
             $table->enum('type', ['deposit', 'transfer']);
             $table->timestamps();

             $table->foreign('sender_id')->references('id')->on('users')->onDelete('set null');
             $table->foreign('receiver_id')->references('id')->on('users')->onDelete('set null');
         });
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
