<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class alumno extends Model
{
    use SoftDeletes;
    protected $table = "alumno";
}
