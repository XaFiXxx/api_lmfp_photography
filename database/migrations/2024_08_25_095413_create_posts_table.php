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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->string('title');  // Titre du post
            $table->string('image')->nullable();  // Image du post (nullable au cas où un post pourrait ne pas avoir d'image)
            $table->text('description');  // Description du post
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Clé étrangère pointant vers la table users
            $table->timestamps();  // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');  // Supprime la table posts
    }
};
