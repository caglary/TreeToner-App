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
        // tarih 
        Schema::create('kasadefteri', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->id();
            $table->timestamps();
            $table->string('aciklama');     
            $table->decimal('fiyat', $precision = 8, $scale = 2)->default(0);
            $table->enum('islem',['gelir','gider']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasadefteri');
    }
};
