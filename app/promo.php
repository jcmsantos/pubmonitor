<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class defaultpromo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'inicio','fim', 'dom','seg','ter','qua','qui','sex','sab',
    ];
}
