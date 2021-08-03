<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class covid extends Model
{
    protected $fillable = ['nb_cas' , 'nb_ret','nb_mort'];
}
