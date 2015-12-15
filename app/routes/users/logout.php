<?php

$app->get('/logout', function () use ($app) {

  unset($_SESSION['username']);
  unset($_SESSION['id']);
  $app->redirect('/login');

})->name('users.logout');