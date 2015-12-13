<?php

use Workout\Models\Workout;

$app->get('/workouts/:nekaj', function ($nekaj) use ($app) {

  try {
    $workouts = Workout::all();
  } catch (ErrorException $e) {
    var_dump($e);
  }


  if (!is_null($workouts)) {
    var_dump($workouts->getAllWorkouts());
  } else {
    echo 'Record dos not exist!';
    //echo $app->response->getStatus();
  }

});

