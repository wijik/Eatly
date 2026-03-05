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
        Schema::create('rekomendasis', function (Blueprint $table) {
            $table->id('id_rekomendasi');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_menu');
            $table->double('skor');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('id_menu')
                ->references('id_menu')
                ->on('menus')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasis');
    }
};
