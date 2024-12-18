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
    Schema::table('fees', function (Blueprint $table) {
        $table->unsignedBigInteger('class_id');
        $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('fees', function (Blueprint $table) {
        $table->dropForeign(['class_id']);
        $table->dropColumn('class_id');
    });
}

};
