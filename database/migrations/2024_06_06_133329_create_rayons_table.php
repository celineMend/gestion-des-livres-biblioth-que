<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rayons', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->unique();
            $table->enum('partie', ['première moitié', 'seconde moitié', 'milieu'])->default('première moitié');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rayons');
        $table->dropColumn('partie');
    }
};
