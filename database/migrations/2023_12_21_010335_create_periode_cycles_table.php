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
        Schema::create('periode_cycles', function (Blueprint $table) {
            $table->id();
            $table->string('cycle periode', 25)->nullable($value=false)->unique();
            $table->bigInteger('cycle')->nullable($value=false);
            $table->foreign('cycle')->references('id')->on('cycles')->onDelete('cascade');
        });
        Schema::table('periode_cycles', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_cycles');
    }
};
