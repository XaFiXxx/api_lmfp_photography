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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname'); // Prénom de l'utilisateur
            $table->string('lastname');  // Nom de famille de l'utilisateur
            $table->string('avatar')->nullable();  // Avatar de l'utilisateur (nullable)
            $table->date('birthday')->nullable();  // Date de naissance de l'utilisateur (nullable)
            $table->string('status')->default('active'); // Statut de l'utilisateur, par défaut 'active'
            $table->string('email')->unique();  // Email unique
            $table->timestamp('email_verified_at')->nullable();  // Timestamp pour la vérification de l'email (nullable)
            $table->string('password');  // Mot de passe
            $table->boolean('isAdmin')->default(false);  // Indique si l'utilisateur est un admin, par défaut 'false'
            $table->string('role')->nullable();  // Rôle de l'utilisateur, nullable si non spécifié
            $table->rememberToken();  // Token pour "Remember Me"
            $table->timestamps();  // Timestamps created_at et updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();  // Email primaire pour les reset tokens
            $table->string('token');  // Token de réinitialisation
            $table->timestamp('created_at')->nullable();  // Date de création du token (nullable)
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();  // ID de session primaire
            $table->foreignId('user_id')->nullable()->index();  // ID utilisateur avec un index
            $table->string('ip_address', 45)->nullable();  // Adresse IP, nullable
            $table->text('user_agent')->nullable();  // User Agent du navigateur, nullable
            $table->longText('payload');  // Données de la session
            $table->integer('last_activity')->index();  // Index pour la dernière activité
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');  // Supprime la table users
        Schema::dropIfExists('password_reset_tokens');  // Supprime la table password_reset_tokens
        Schema::dropIfExists('sessions');  // Supprime la table sessions
    }
};
