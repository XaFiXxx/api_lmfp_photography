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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->text('content');  // Contenu du commentaire
            $table->foreignId('post_id')->nullable()->constrained('posts')->onDelete('cascade');  // Clé étrangère vers la table posts (nullable si c'est une réponse)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Clé étrangère vers la table users
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');  // Clé étrangère auto-référentielle pour les réponses
            $table->timestamps();  // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');  // Supprime la table comments
    }
};
