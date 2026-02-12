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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('preferensi_rasa_id');
            $table->integer('nilai_konversi');
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('preferensi_rasa_id')->references('id_preferensi_rasa')->on('preferensi_rasa')->onDelete('cascade');

            $table->unique(['user_id', 'preferensi_rasa_id']);
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
