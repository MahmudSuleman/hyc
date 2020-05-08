<?php
/**
 * Created by PhpStorm.
 * User: Chamtooni
 * Date: 3/4/2020
 * Time: 3:43 AM
 */

require_once '../private/init.php';
$title = 'Login';
require '../private/includes/header.php';
require '../private/includes/header_nav.php';

if(isset($_POST['submit'])){
	if(User::signin($_POST['userName'], $_POST['password'])){
		echo 'ok';
		header("location: index.php");
	}

}
?>

<div class="container">
	<div class="login">
		<h2 class="form-title">Login here</h2>

		<form action="login.php" method="post">
			<div class="form-group">
				<label for="username">Username/Email</label>
				<input type="text" class="form-control" id="username" name="userName">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>

			<div class="form-group">
				<button class="btn btn-outline-primary btn-block" name="submit" type="submit">signin</button>
			</div>
			<p>Don't have an account, signup <a href="signup.php">here</a></p>
		</form>
	</div>
</div>

<?php
require_once '../private/includes/footer_nav.php';
require_once '../private/includes/footer.php';
?>