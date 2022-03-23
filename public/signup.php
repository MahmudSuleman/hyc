<?php 

require_once '../private/init.php';
$title = 'Create new account';

require_once '../private/includes/header.php';

if (isset($_POST['signup'])) 
{
//    die('clicked');
	$arg = [];
	$arg['userName'] = $_POST['userName'];
	$arg['firstName'] = $_POST['firstName'];
	$arg['lastName'] = $_POST['lastName'];
	$arg['email'] = $_POST['email'];
	$arg['phone'] = $_POST['phone'];
	$arg['password'] = $_POST['password'];
	$arg['password2'] = $_POST['password2'];

	if ($_POST['password2'] == $_POST['password'])
	{
		$user = new User($arg);
		$user->setPassword($arg['password']);
        $user->create();
        redirect_to(url_for('login.php'));
	}else{
        global $errors;
        array_push($errors, 'password do not match.');
    }


	
}


 ?>

 <div class="container">
 	<div class="login">
 		<h2 class="form-title">Signup Here</h2>
        <?php include_once 'errors.php'; ?>
 		<form action="signup.php" method="post">
 			<div class="form-group">
 				<input required type="text" class="form-control" id="userName" name="userName" placeholder="Enter Username">
 				<label for="userName">Username</label>
 			</div>

 			<div class="form-group">
 				<input required type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name">
 				<label for="firstName">FirstName</label>
 			</div>

 			<div class="form-group">
 				<input required type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter First Name">
 				<label for="lastName">lastName</label>
 			</div>

 			<div class="form-group">
 				<input required type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
 				<label for="email">Email</label>
 			</div>

 			<div class="form-group">
 				<input required type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
 				<label for="phone">Phone</label>
 			</div>

 			<div class="form-group">
 				<input required type="password" class="form-control" id="password" name="password" placeholder="Enter password">
 				<label for="password">Password</label>
 			</div>

 			<div class="form-group">
 				<input required type="password" class="form-control" id="password2" name="password2" placeholder="Enter password again">
 				<label for="password2">confirm password</label>
 			</div>

 			<div class="form-group">
 				<button class="btn btn-outline-success btn-block" name="signup" type="submit">Signup</button>
 			</div>
 			
 			<p>already have an account? sign in <a href="login.php">here</a></p>
 		</form>
 	</div>
 </div>

<?php require_once '../private/includes/footer.php'; ?>
