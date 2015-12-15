<?php

use Workout\Models\User;

$app->get('/', function () use ($app) {

  if (isset($_SESSION['id'])) {
    $user = User::find($_SESSION['id']);
  }

  $app->render('guest/home.twig', [
    'title'     => 'Create Workout',
    'logged'    => empty($user) ? false : true
  ]);

})->name('home');