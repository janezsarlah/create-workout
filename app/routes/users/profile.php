<?php

use Workout\Models\User;

$app->map('/user/profile', $authenticate($app), function () use ($app) {

  if ($app->request->isPost()) {

    $new_pass = $app->request()->post('new_password');
    $new_pass_again = $app->request()->post('new_password_again');

    if (empty($new_pass) && empty($new_pass_again)) {

      $affectedRows = User::find($_SESSION['id'])->update([
        'first_name' => trim($app->request()->post('first_name')),
        'last_name' => trim($app->request()->post('last_name')),
        'username' => trim($app->request()->post('username')),
        'password' => password_hash(trim('new_pass'), PASSWORD_DEFAULT)
      ]);

    } else {

      $affectedRows = User::find($_SESSION['id'])->update([
        'first_name' => trim($app->request()->post('first_name')),
        'last_name' => trim($app->request()->post('last_name')),
        'username' => trim($app->request()->post('username'))
      ]);

    }

    $user = User::find($_SESSION['id']);

    $app->render('/users/profile.twig', [
      'title'       => 'Users profile',
      'username'    => $user->username,
      'message'     => 'User data update!',
      'logged'      => true,
      'loggedin'    => empty($user) ? false : true,
      'fist_name'   => $user->first_name,
      'last_name'   => $user->last_name,
      'username'    => $user->username,
      'email'       => $user->email
    ]);

  } else {

    $user = User::find($_SESSION['id']);

    $app->render('/users/profile.twig', [
      'title'       => 'Users profile',
      'username'    => $user->username,
      'logged'      => true,
      'loggedin'    => empty($user) ? false : true,
      'fist_name'   => $user->first_name,
      'last_name'   => $user->last_name,
      'username'    => $user->username,
      'email'       => $user->email
    ]);

  }

})->via('GET','POST')->name('users.profile.edit');


$app->get('/user/profile/edit/success', function () use ($app) {

  echo "Edit success";

})->name('users.profile.edit.success');

