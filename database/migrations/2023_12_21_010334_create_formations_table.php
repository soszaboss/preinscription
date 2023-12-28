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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('nom formation', 100)->nullable()->unique();
            $table->unsignedBigInteger('departement');
            $table->unsignedBigInteger('cycle');
            $table->foreign('departement')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('cycle')->references('id')->on('periode_cycles')->onDelete('cascade');
            $table->bigInteger('cout de la formation')->nullable($value=false);
        });
        Schema::table('formations', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
