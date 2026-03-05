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
            $table->string('gambar', 100);
            $table->string('nama_menu', 100);
            $table->text('deskripsi');
            $table->boolean('is_today')->default(false);
            $table->timestamp('is_today_set_at')->nullable();
            $table->integer('kalori');
            $table->integer('protein');
            $table->integer('lemak');
            $table->unsignedBigInteger('id_preferensi_rasa');
            $table->timestamps();

            $table->foreign('id_preferensi_rasa')
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
