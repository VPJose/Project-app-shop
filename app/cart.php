<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public function details()
    {
      return $this->hasMany(CartDetail::class);
    }
}
