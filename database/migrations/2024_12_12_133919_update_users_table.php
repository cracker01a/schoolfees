<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */  public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->after('id');
            $table->string('lastname')->after('firstname');
            $table->boolean('isActive')->default(true)->after('lastname');
            $table->enum('status', [  'comptable', 'parent'])->after('isActive');
            $table->string('number')->nullable()->after('status'); // Nouveau champ pour le numéro
          
        });
    
    }
    
};
