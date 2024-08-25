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
        Schema::create('comment_likes', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->foreignId('comment_id')->constrained('comments')->onDelete('cascade');  // Clé étrangère vers la table comments
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Clé étrangère vers la table users
            $table->timestamps();  // Colonnes created_at et updated_at

            $table->unique(['comment_id', 'user_id']);  // Pour éviter les doublons de likes par un même utilisateur
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_likes');  // Supprime la table comment_likes
    }
};
