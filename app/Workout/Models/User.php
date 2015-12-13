<?php namespace Workout\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

  protected $fillable = ['first_name', 'last_name', 'username', 'email'];

  public function workouts() {
    return $this->hasMany('Workout', 'user_id');
  }

}