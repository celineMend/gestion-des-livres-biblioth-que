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
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('titre');
            $table->date('date_de_publication');
            $table->integer('nombre_de_page');
            $table->string('isbn',20)->unique();
            $table->string('auteur');
            $table->string('editeur');
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('rayon_id')->constrained('rayons')->onDelete('cascade');
            $table->boolean('disponibilite')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
        $table->dropColumn('image');
    }
};
