<?php 

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

if(isset($_SESSION['fields'])) {
	$fields = $_SESSION['fields'];
} else {
	$fields = '';
}

if(isset($_SESSION['return_message'])) {
	$return_message = $_SESSION['return_message'];
} else {
	$return_message = '';
}

if(isset($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	if(empty($errors))
		$fields = '';

} else {
	$errors = '';
	$fields = '';
}

$page_title = "Contact";

$selected4 = 'selected';

$title = 'contact me.';

$sub_title = 'Want to work on a project together or just want to say hello? Send <a href="mailto:janez@theveloper.si">me a mail</a> or use the form below!'; 

require_once 'helpers/security.php';

include 'assets/_partials/head.php';

?>

	<div class="content">
		<div class="contact-wrapper">
			<div class="contact-form">
				<h2 class="form-title">Let's get to know each other!</h2>

				<?php if(!empty($errors)) : ?>
					<div class="contact-errors">
						<ul><li><span class="error-message-red">Error: </span><?php echo implode('</li><li><span class="error-message-red">Error: </span>', $errors); ?></li></ul>
					</div>
				<?php endif; ?>

				<?php if(!empty($return_message)) : ?>
					<div class="contact-success">
						<ul><li><span class="return-message">Success: </span><?php echo implode('</li><li>', $return_message); ?></li></ul>
					</div>
				<?php endif; ?>


				<form class="form-flex" method="post" action="/form-handler.php">
					<div class="input"><input type="text" name="name" placeholder="Your name" <?php echo isset($fields['name']) ? 'value="' . e($fields['name']). '"' : ''; ?>></div>
					<div class="input"><input type="email" name="email" placeholder="Your email" <?php echo isset($fields['email']) ? 'value="' . e($fields['email']). '"' : ''; ?>></div>
					<div class="textarea"><textarea name="message" rows="8" placeholder="What can I help you with?"><?php echo isset($fields['message']) ? $fields['message'] : ''; ?></textarea></div>
					<div class="form-button"><input type="submit" value="Send Message"></div>
				</form>
			</div>

			<div class="location social">
				<h4><a href="https://www.google.si/maps/place/Maribor/@46.5535185,15.5745101,12z/data=!3m1!4b1!4m2!3m1!1s0x476f77a6ea402051:0x1053af90bc0daa22" target="_blank"><i class="fa fa-map-marker"></i>Maribor, Slovenia</a></h4>
				<a href="mailto:janez@theveloper.si"><i class="fa fa-envelope"></i></a>
				<a href="" class="tooltip" data-tooltip="janezsarlah"><i class="fa fa-skype"></i></a>
				<a href="https://github.com/janezsarlah/" target="_blank"><i class="fa fa-github-alt"></i></a>
				<a href="https://twitter.com/janezsarlah/" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="https://www.facebook.com/janez.sarlah.9" target="_blank"><i class="fa fa-facebook"></i></a>
			</div>
		</div>
	</div>

<?php 

include 'assets/_partials/foot.php'; 

unset($_SESSION['errors']);
unset($_SESSION['fields']);
unset($_SESSION['return_message']);

?>

