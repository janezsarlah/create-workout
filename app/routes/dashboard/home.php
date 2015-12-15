<?php

use Workout\Models\User;

$app->get('/dashboard', $authenticate($app), function () use ($app) {

  $user = User::find($_SESSION['id']);

  $app->render('dashboard/home.twig', [
    'title'       => 'Dashboard',
    'username'    => $user->username,
    'logged'      => true,
    'loggedin'    => empty($user) ? false : true
  ]);

})->name('dashboard.home');