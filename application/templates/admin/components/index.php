<!DOCTYPE html>
<html>

<head>
	<title>Smartboard - Luci</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="My smartboard admin index">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/public/css/style.css" type="text/css" />
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
	
	<header>
		<?php require_once 'header.php' ?>
	</header>
	<aside>
		<?php require_once 'sidebar.php'	?>
	</aside>

	<div class="content">
		
 		<?php if ($TEMPLATE_VARS['globalError']) { ?>
 			<div class="globalError">
 				<?=$TEMPLATE_VARS['globalError'] ?>
 			</div>
 		<?php } ?>	
 		
		<?php require_once ADMIN_TEMPLATES_PATH . $TEMPLATE_VARS['templatePath'] ?>

	</div>	<!-- end content -->

</body>

</html>
