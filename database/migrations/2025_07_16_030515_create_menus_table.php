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
        Schema::create('menus', function (Blueprint $table) {
            $table->id('id_menu');
            $table->string('nama_menu');
            $table->integer('kalori');
            $table->integer('protein');
            $table->integer('lemak');
            $table->unsignedBigInteger('preferensi_rasa_id');
            $table->timestamps();

            $table->foreign('preferensi_rasa_id')
                ->references('id_preferensi_rasa')
                ->on('preferensi_rasa')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
