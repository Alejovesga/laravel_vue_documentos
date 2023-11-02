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
        Schema::create('doc_documentos', function (Blueprint $table) {
            $table->id();
            $table->string("DOC_NOMBRE");
            $table->integer("DOC_CODIGO");
            $table->text("DOC_CONTENIDO");
            $table->unsignedBigInteger("DOC_ID_TIPO");
            $table->unsignedBigInteger("DOC_ID_PROCESO");
            $table->foreign("DOC_ID_TIPO")->references("id")->on("tip_tipo_docs")->onDelete("cascade");
            $table->foreign("DOC_ID_PROCESO")->references("id")->on("pro_procesos")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_documentos');
    }
};
