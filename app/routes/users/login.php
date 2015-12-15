<?php

use Workout\Models\User;

$app->map('/login', function () use ($app) {

  if ($app->request()->isPost()) {

    $errors = [];

    $email = $app->request()->post('email');

    $password = $app->request()->post('password');

    $user = User::where('email', $email)->where('active', 1)->first();

    if ($user && password_verify($password, $user->password)) {

      $_SESSION['username'] = $user->username;
      $_SESSION['id'] = $user->id;

    } else {
      $errors[] = "The email and password don't match!";
    }

    if (!empty($errors)) {
      $app->render('users/login.twig', [
        'errors' => $errors,
        'email' => $email
      ]);
    } else {
      $app->redirect('/dashboard');
    }

  } else {

    if (isset($_SESSION['id'])) {
      $app->redirect('/dashboard');
    } else {
      $app->render('/users/login.twig');
    }

  }

})->via('GET', 'POST')->name('users.login');


