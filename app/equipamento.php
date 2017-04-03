<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipamento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 
        'macAddress',
        'ip',
        'width',
        'height',
        'colorDepth',
        'pixelDepth',
        'availWidth',
        'availHeight',
        'loja_id',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public function loja(){
        return $this->belongsTo(loja::class);
    }

    public function changeloja($l){
        $l=loja::get()->where('nome',$l);
        return $this->loja_id=$l->id;
    }

}
