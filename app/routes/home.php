<?php

$app->get('/', function () use ($app) {

  $app->redirect('/login');
  //$app->render('home.twig');

})->setName('home');