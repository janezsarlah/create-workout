<?php

use Workout\Models\Workout;

$app->get('/workouts', function () use ($app) {

  try {
    $workouts = Workout::all();
  } catch (ErrorException $e) {
    var_dump($e);
  }

});

