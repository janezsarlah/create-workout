<?php namespace Workout\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Exercise extends Eloquent {

  public $timestamps = false;

  public function groups() {

    return $this->belongsToMany('\Workout\Models\Group');

  }

}