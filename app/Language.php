<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    protected $table = 'language';

    protected $fillable = ['name','locale','status'];
}
