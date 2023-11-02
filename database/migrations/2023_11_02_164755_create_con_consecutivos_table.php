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
            $table->unsignedBigInteger("CON_ID_PROCESO");
            $table->unsignedBigInteger("CON_ID_TIPO");
            $table->foreign("CON_ID_PROCESO")->references("id")->on("pro_procesos")->onDelete("cascade");
            $table->foreign("CON_ID_TIPO")->references("id")->on("tip_tipo_docs")->onDelete("cascade");
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
