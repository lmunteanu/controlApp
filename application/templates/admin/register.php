<!DOCTYPE html>
<html>

<head>
	<title>Smartboard - Luci</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta content="description" content="My smartboard">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/public/css/style.css" type="text/css" />
	<link rel="stylesheet" href="/public/css/login-up.css" type="text/css" />
</head>

<body>
	<!-- <a class="lclose" href=/admin.php> </a> -->
	<div class="log-container">
		<form method="POST" action="">
			
			<div class="form-header">Sign up</div>
			<div class="form-content sign-up-spacing">
				<?php if ($TEMPLATE_VARS['registerErrorMessage']) { ?>
			
					<div class='validationError'> <?php echo $TEMPLATE_VARS['registerErrorMessage']; ?></div>
			
				<?php } ?>
				<input type="text" 
						placeholder="Username" 
						name="uname"
						value="<?=htmlspecialchars($TEMPLATE_VARS['user']->name)?>"
				/>
				<input type="text" 
						placeholder="E-mail address" 
						name="email"
						value="<?=htmlspecialchars($TEMPLATE_VARS['user']->email)?>"
				/>

				<input type="password" placeholder="Password" name="psw" id="passwd" />
				<input type="password" placeholder="Confirm Password" name="cpsw" />

				<button class="login-button sign-up-button" type="submit">Create account</button>
			</div>
			<div class="form-footer sign-up-form-footer"><a href="?page=login">Already have an account? Log in</a></div>
		</form>
	</div>
</body>

</html>
