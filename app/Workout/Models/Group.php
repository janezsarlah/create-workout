<?php namespace Workout\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Group extends Eloquent {

  public $timestamps = false;

  public function exercises() {

    return $this->belongsToMany('\Workout\Models\Exercise');

  }

}