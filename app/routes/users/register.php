<?php

use Workout\Models\User;
use Workout\Models\Mail;

$app->map('/register', function () use ($app) {

  if ($app->request->isPost()) {

    $errors = [];

    $email = $app->request()->post('email');

    $email_code = md5($email + microtime());

    $password = $app->request()->post('password');

    $password_again = $app->request()->post('password_again');

    $username = 'user' . rand(10000, 1000000);

    $user = User::where('email', $email)->first();

    if (!$user) {
      if($password == $password_again) {

        $user = new User;

        $user->username = $username;
        $user->email = $email;
        $user->email_code = $email_code;
        $user->password = password_hash($password, PASSWORD_DEFAULT);

        $user->save();

        $mail = Mail::sendEmail($email, $email_code);

      } else {
        $errors[] = "Passwords do not match!!";
      }
    } else {
      $errors[] = "This email already exists!";
    }

    if (!empty($errors)) {
      $app->render('users/register.twig', ['errors' => $errors]);
    } else if ($mail) {
      $app->render('users/register.twig', [
        'success' => true,
        'message' => 'To complete the registration you must confirm your email!'
      ]);
    } else {
      $app->render('users/register.twig', [
        'success' => false,
        'message' => 'An error occurred while registering your account. Contact the administrator at janez@theveloper.si!'
      ]);
    }

  } else {

    if (isset($_SESSION['id'])) {
      $app->redirect('/dashboard');
    }

    $app->render('users/register.twig', [
      'loggedin' => empty($user) ? false : true
    ]);
  }

})->via('GET', 'POST')->name('users.register');



