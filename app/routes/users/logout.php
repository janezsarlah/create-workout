<?php

$app->get('/logout', function () use ($app) {

  unset($_SESSION['username']);
  unset($_SESSION['email']);
  $app->redirect('/login');

})->name('users.logout');