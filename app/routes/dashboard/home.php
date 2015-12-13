<?php

$app->get('/dashboard', $authenticate($app), function () use ($app) {

  $app->render('dashboard/home.twig');

})->name('dashboard.home');