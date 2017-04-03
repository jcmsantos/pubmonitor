<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//use App\Lojas;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->macAddress('macAddress');
            $table->ipAddress('ip')->nullable();
            $table->integer('width');
            $table->integer('height');
            $table->integer('colorDepth');
            $table->integer('pixelDepth');
            $table->integer('availWidth');
            $table->integer('availHeight');
            $table->integer('loja_id')->nullable();
            $table->String('nome')->default('');
            $table->timestamps();
        });
  
        App\equipamento::create([
            'macAddress'=>'aa00bb00c00',
            'ip' => '10.11.101.11',
            'width'=>'1',
            'height'=>'1',
            'colorDepth'=>'1',
            'pixelDepth'=>'1',
            'availWidth'=>'1',
            'availHeight'=>'1',
            ]);
        App\equipamento::create([
            'macAddress'=>'aa00bb00cbb',
            'ip' => '10.11.101.12',
            'width'=>'1',
            'height'=>'1',
            'colorDepth'=>'1',
            'pixelDepth'=>'1',
            'availWidth'=>'1',
            'availHeight'=>'1',
            ]);
        App\equipamento::create([
            'Nome' => 'teste',
            'macAddress'=>'aa00bb00cbb',
            'ip' => '10.11.102.11',
            'width'=>'1',
            'height'=>'1',
            'colorDepth'=>'1',
            'pixelDepth'=>'1',
            'availWidth'=>'1',
            'availHeight'=>'1',
            'loja_id' => 1,
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
}
