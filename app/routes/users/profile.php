<?php

use Workout\Models\User;
use Workout\Models\Mail;

$app->get('/user', function () use ($app) {


  var_dump($email_code = md5('janez.sarlah@gmail.com' + microtime()));

})->name('users.profile');