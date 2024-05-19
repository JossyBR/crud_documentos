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
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->increments('doc_id');
            $table->string('doc_nombre', 50);
            $table->string('doc_codigo', 20)->unique();
            $table->string('doc_contenido', 4000);
            $table->unsignedInteger('doc_id_tipo')->unsigned(); 
            $table->unsignedInteger('doc_id_proceso')->unsigned();
            $table->timestamps();

            // claves foráneas
            $table->foreign('doc_id_tipo')->references('tip_id')->on('tip_tipo_doc')->onDelete('cascade');
            $table->foreign('doc_id_proceso')->references('pro_id')->on('pro_proceso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_documento');
    }
};
