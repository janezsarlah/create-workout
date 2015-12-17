<?php

use Workout\Models\Exercise;
use Workout\Models\User;

$app->get('/dashboard/exercises', $authenticate($app), function () use ($app) {

  $exercise = Exercise::with('groups')->get();

  $user = User::find($_SESSION['id']);

  $app->render('dashboard/exercises.twig', [
    'title'       => 'List of exercises',
    'username'    => $user->username,
    'logged'      => true,
    'loggedin'    => empty($user) ? false : true,
    'exercises'   => $exercise
  ]);

});


$app->get('/dashboard/exercises/:slug', $authenticate($app), function ($slug) use ($app) {

  $exercise = Exercise::with('groups')->where('slug', $slug)->first();

  $user = User::find($_SESSION['id']);

  $app->render('dashboard/exercises-single.twig', [
    'title'       => 'Exercise description',
    'username'    => $user->username,
    'logged'      => true,
    'loggedin'    => empty($user) ? false : true,
    'exercises'   => $exercise
  ]);

});