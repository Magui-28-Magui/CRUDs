<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LAnimales extends Model
{
    protected $fillable = ['nombre', 'raza', 'color','edad','animal_id'];
}
