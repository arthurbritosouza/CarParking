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
        Schema::create('carros', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->nullable();
            $table->text('placa')->nullable();
            $table->text('modelo')->nullable();
            $table->time('hora_ent')->nullable();
            $table->time('hora_saida')->nullable();
            $table->text('dia_ent')->nullable();
            $table->text('dia_saida')->nullable();
            $table->integer('status')->nullable();
            $table->dateTime('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
