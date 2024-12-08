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
            Schema::create('fees', function (Blueprint $table) {
                $table->id();
                $table->string('type'); // Inscription ou Scolarité
                $table->decimal('amount', 10, 2);
                $table->text('description')->nullable();
                $table->date('due_date'); // Date limite de paiement
                $table->string('class')->nullable(); // Classe concernée
                $table->timestamps();
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};