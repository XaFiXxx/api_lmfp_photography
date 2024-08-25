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
        Schema::create('posts_has_categories', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('posts')->onDelete('restrict');  // Clé étrangère vers la table posts, empêche la suppression si relation existante
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');  // Clé étrangère vers la table categories, empêche la suppression si relation existante

            // Clé primaire composite
            $table->primary(['post_id', 'category_id']);

            $table->timestamps();  // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_has_categories');  // Supprime la table posts_has_categories
    }
};
