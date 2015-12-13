<?php

use Workout\Models\User;

$app->get('/activate/:email/:email_code', function ($email, $email_code) use ($app) {

  $user = User::where('email', trim($email))->where('email_code', trim($email_code))->first();

  if ($user) {
    User::where('email', $email)->update(['active' => 1]);
    $app->redirect('/activate/success');
  } else {
    $app->redirect('/activate/error');
  }

})->name('users.activate');


$app->get('/activate/success', function () use ($app) {

  $app->render('success/activation.twig');

})->name('users.activate.success');


$app->get('/activate/error', function () use ($app) {

  $app->render('error/activation.twig');

})->name('users.activate.error');