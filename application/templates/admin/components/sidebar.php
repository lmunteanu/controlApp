<div class="aside-content">
	<div class="aside-user">
		<div class="user-img"></div>
		<p class="user-text">
			<?=htmlspecialchars($TEMPLATE_VARS['loggedUser']->name)?>
		</p>
	</div>
	<!--	<button class="button">Create new</button>-->
	<a id="create-new" href="/admin.php?page=article" class="box">Create new</a>
	<div class="aside-menu">
		<a class="active" href="#">Dashboard</a>
		<a href="#">Widgets</a>
		<a href="#">Charts</a>
		<a href="#">Tables</a>
		<a href="#">Alerts</a>
	</div>
	<div class="login-logout">
			<a href="/admin.php?page=logout">Logout</a>
	</div>
</div>