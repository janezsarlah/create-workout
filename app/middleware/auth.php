<?php

$authenticate = function ($app) {
  return function () use ($app) {
    if (!isset($_SESSION['id'])) {
      # TODO: Save current link for when the user logs in again
      $app->redirect('/login');
    }
  };
};

# TODO: Authenticate for user role
#       Source http://docs.slimframework.com/routing/middleware/