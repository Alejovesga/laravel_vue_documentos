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
        Schema::create('con_consecutivos', function (Blueprint $table) {
            $table->id();
            $table->integer("CON_CONSECUTIVO");
            $table->string("CON_ID_PROCESO");
            $table->string("CON_ID_TIPO");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('con_consecutivos');
    }
};
