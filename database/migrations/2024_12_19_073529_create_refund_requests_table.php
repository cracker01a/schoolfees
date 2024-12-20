<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('refund_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID de l'utilisateur effectuant la demande
            $table->unsignedBigInteger('child_id')->nullable(); // ID de l'enfant (si applicable)
            $table->decimal('amount', 10, 2); // Montant du remboursement demandé
            $table->string('reason'); // Raison du remboursement
            $table->string('status')->default('pending'); // Statut: pending, approved, rejected
            $table->timestamps();
    
            // Clés étrangères
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('children')->onDelete('set null');
        });
    }
    
};
