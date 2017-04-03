<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultPromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defaultpromos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('caminho')->nullable();
            $table->string('md5')->nullable();
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();
            $table->boolean('dom')->nullable()->default(true);
            $table->boolean('seg')->nullable()->default(true);
            $table->boolean('ter')->nullable()->default(true);
            $table->boolean('qua')->nullable()->default(true);
            $table->boolean('qui')->nullable()->default(true);
            $table->boolean('sex')->nullable()->default(true);
            $table->boolean('sab')->nullable()->default(true);
            $table->timestamps();
        });
        App\defaultpromo::create([
            'nome'=>'#telepizza',
            'caminho'=>'telepizza.png',
            'md5'=>'cebb2c01f46ea574d924884616fa6360',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('defaultpromos');
    }
}
