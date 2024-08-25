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
        Schema::create('gallery', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->string('picture');  // URL ou chemin de l'image
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');  // Clé étrangère vers la table posts
            $table->timestamps();  // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery');  // Supprime la table gallery
    }
};
