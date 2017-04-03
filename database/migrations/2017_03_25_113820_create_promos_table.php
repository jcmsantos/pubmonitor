<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipamento_id');
            $table->integer('deafulpromo_id');
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();
            $table->boolean('dom')->default(true);
            $table->boolean('seg')->default(true);
            $table->boolean('ter')->default(true);
            $table->boolean('qua')->default(true);
            $table->boolean('qui')->default(true);
            $table->boolean('sex')->default(true);
            $table->boolean('sab')->default(true);
            $table->integer('excecao_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promos');
    }
}
