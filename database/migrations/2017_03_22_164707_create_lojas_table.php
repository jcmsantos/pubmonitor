<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLojasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lojas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nome');
            $table->timestamps();
        });
        App\loja::create(['codigo'=>3501, 'nome'=>'Telheiras']);
        App\loja::create(['codigo'=>3502, 'nome'=>'5 de Outubro']);
        App\loja::create(['codigo'=>3503, 'nome'=>'Roma']);
        App\loja::create(['codigo'=>3504, 'nome'=>'Braancamp']);
        App\loja::create(['codigo'=>3505, 'nome'=>'Amadora']);
        App\loja::create(['codigo'=>3506, 'nome'=>'Antas']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lojas');
    }
}
