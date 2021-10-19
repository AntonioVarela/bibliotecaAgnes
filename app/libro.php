<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class libro extends Model
{
    use SoftDeletes;
    protected $table = "libro";
}
