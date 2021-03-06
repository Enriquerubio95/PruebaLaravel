<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'destinatarios', 'urlorigen', 'mensajeExtra',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
