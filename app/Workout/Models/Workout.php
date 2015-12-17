<?php namespace Workout\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Workout extends Eloquent {

  public $timestamps = false;

  public function exercises() {

    return $this->belongsToMany('\Workout\Models\Exercise');

  }

  public function user() {

    return $this->belongsTo('\Workout\Models\User');

  }

}

