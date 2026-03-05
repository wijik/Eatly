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
        Schema::create('preferensi_rasa_user', function (Blueprint $table) {
            $table->id('id_preferensi_rasa_user');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_preferensi_rasa');
            $table->integer('nilai_konversi');
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('id_preferensi_rasa')
                ->references('id_preferensi_rasa')
                ->on('preferensi_rasa')
                ->onDelete('cascade');

            $table->unique(['id_user', 'id_preferensi_rasa']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferensi_rasa_user');
    }
};
