<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kayits', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->id();
            $table->string('yazici_model')->nullable();
            $table->string('yazici_seri_no')->nullable();
            $table->enum('usb_kablo',['var','yok'])->default('yok');
            $table->enum('power_kablo',['var','yok'])->default('yok');
            $table->string('ariza')->nullable();
            $table->string('aciklama')->nullable();
            $table->string('sonuc')->nullable();
            $table->decimal('fiyat', $precision = 8, $scale = 2)->default(0);
            $table->timestamps();
            $table->foreignId('musteri_id')->references('id')->on('musteries')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kayits');
    }
};
