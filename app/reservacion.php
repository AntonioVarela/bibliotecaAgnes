<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservacion extends Model
{
    use SoftDeletes;
    protected $table = "reservacion";
}
