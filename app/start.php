<?php

session_start();

use Illuminate\Database\Capsule\Manager as Captule;



require 'vendor/autoload.php';
require 'config/database.php';
require 'middleware/auth.php';

$app = new \Slim\Slim([
  'view' => new \Slim\Views\Twig(),
  'mode' => 'development'
]);


$app->configureMode('test', function () use ($app) {
  $app->config([
    'log.enable' => false,
    'debug' => true
  ]);
});

$app->configureMode('development', function () use ($app) {
  $app->config([
    'log.enable' => false,
    'debug' => true
  ]);
});

$app->configureMode('production', function () use ($app) {
  $app->config([
    'log.enable' => false,
    'debug' => false
  ]);

  $app->error(function () use ($app) {
    $app->render('errors/500.twig', [], 500);
    # TODO: Implement error logging and admin notification
  });
});


$app->db = function () {
  return new Captule;
};

$view = $app->view();
$view->setTemplatesDirectory('app/views');
$view->parserExtensions = [
  new \Slim\Views\TwigExtension()
];

require 'assets/partials/header.php';

require 'routes.php';

require 'assets/partials/footer.php';