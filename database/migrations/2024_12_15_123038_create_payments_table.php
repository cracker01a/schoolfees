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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id'); // Clé étrangère vers children
            $table->unsignedBigInteger('fee_id'); // Clé étrangère vers fees
            $table->decimal('amount', 10, 2); // Montant payé
            $table->timestamp('paid_at')->nullable(); // Date de paiement
            $table->timestamps();

            // Foreign keys
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }

};
