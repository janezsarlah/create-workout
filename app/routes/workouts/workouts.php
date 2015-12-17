<?php

use Workout\Models\Workout;
use Workout\Models\User;

$app->get('/dashboard/workouts', $authenticate($app), function () use ($app) {



});

