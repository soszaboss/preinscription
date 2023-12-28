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
        Schema::create('preinscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('documents');
            $table->unsignedBigInteger('formation');
            $table->unsignedBigInteger('methode de paiment');
            $table->date('date debut');
            $table->date('date fin');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('documents')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('formation')->references('id')->on('formations')->onDelete('cascade');
            $table->foreign('methode de paiment')->references('id')->on('payment_methonds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */

};
