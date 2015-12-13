<?php namespace Workout\Models;

class Mail {

  public static function sendEmail($email, $email_code) {

    try {

      $m = new \PHPMailer(true);

      $m->isSMTP();
      $m->SMTPAuth = true;
      //$m->SMTPDebug = 1;
      $m->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
        )
      );

      //$m->Host = 'mail.theveloper.si';
      $m->Host = 'smtp.gmail.com';

      //$m->Username = 'janez@theveloper.si';
      $m->Username = 'janez.sarlah@gmail.com';
      $m->Password = '<pass>';

      $m->SMTPSecure = 'tls';
      $m->Port = 587;

      $m->setFrom('no-replay@theveloper.si', 'Create Workout');
      $m->Subject = 'Activate your account';
      $m->Body = "Hello there, \n\nThank you for registering. To activate your account, click the link bellow! \n\nhttp://workout.dev/activate/$email/$email_code \n\n- Create Workout";

      $m->AddAddress($email);

      $m->send();

    } catch (\phpmailerException $e) {
      # TODO: notify admin
      //return $e->errorMessage();
      return false;
    } catch (\Exception $e) {
      //return $e->getMessage();
      return false;
    }

    return true;

  }

}