<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    public function setValueAttribute($value)
  {
    $this->attributes['value'] = strtolower($value);
  }

}
