<!DOCTYPE html>
<html>

<head>
	<title>Smartboard - Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="My smartboard login">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/public/css/style.css" type="text/css" />
	<link rel="stylesheet" href="/public/css/login-up.css" type="text/css" />
</head>

<body>
	<!-- <a class="lclose" href=/admin.php> </a> -->
	<div class="log-container">
		<form method="POST" action="">
			<div class="form-header">Log in</div>
			<div class="form-content">
			<?php if ($TEMPLATE_VARS['successMsg']) { ?>
			
			<div class='validationError'> <?php echo $TEMPLATE_VARS['successMsg']; ?></div>
			
			<?php } ?>
				<input type="text" placeholder="Username" name="uname">
				<input type="password" placeholder="Password" name="psw">
				<button class="login-button" type="submit">Sign in</button>
			</div>
			<div class="form-footer">
				<a href="?page=register">Sign up</a>
				<a href="#">Forgot password?</a>
			</div>
		</form>
	</div>
</body>

</html>
