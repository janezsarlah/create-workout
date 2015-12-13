<?php namespace Workout\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Workout extends Eloquent {

  public $timestamps = false;

  public function exercises() {
    return $this->belongsToMany('Exercise');
  }

}

