<!DOCTYPE html>
<html>

<head>
	<title>Smartboard - Luci</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta content="description" content="My smartboard">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/public/css/style.css" type="text/css" />
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!--
	<script type="text/javascript">
		google.charts.load('current', {
			packages: ['corechart']
		});
	</script>
-->
</head>

<body>
	<header>
		<div class="logo"> SMARTBOARD</div>
		<a class="dash" href="#">MY DASHBOARD</a>
		<a class="stats" href="#">STATISTICS</a>
		<div class="menu-burger">
			<div class="hamburger"></div>
		</div>
	</header>
	<!-- end header-->

	<aside>
		<div class="aside-content">
			<div class="aside-user">
				<div class="user-img"></div>
				<p class="user-text">Current user</p>
			</div>
			<!--	<button class="button">Create new</button>-->
			<a id="create-new" href="/edit-article.html" class="box">Create new</a>
			<div class="aside-menu">
				<a class="active" href="#">Dashboard</a>
				<a href="#">Widgets</a>
				<a href="#">Charts</a>
				<a href="#">Tables</a>
				<a href="#">Alerts</a>
			</div>
			<div class="login-logout">
				<a href="login.html">Logout</a>
			</div>
		</div>
	</aside>
	<!--end aside-->

	<div class="content">
		<div class="content-left">
			<div class="inbox box">
				<div class="inboxHeader">
					<div class="smc">
						<div class="small-message">...</div>
					</div>
					<span class="inboxHText">Inbox </span>
				</div>
				<div class="inboxContent">
					<p class=inboxCText>
						Want to see how your emails look in over 50+ desktop, mobile, and webmail clients, including in plain text? Never forget to include plain text as part of your next email campaign with Litmus Checklist.
					</p>
					<a href="#" class="read-more">Read more</a>
				</div>
			</div>
			<div class="laptop box">
				<div class="laptop-img-div"></div>
				<a href="article.html">
					<p class="product-img-text"> New Product </p>
				</a>
			</div>
			<div class="code box">
				<a href="article.html">
					<div class="code-img-div"></div>
					<p class="product-img-text"> Copy of New Product </p>
				</a>
			</div>
		</div>
		<!-- end left content -->

		<div class="content-right">
			<div class="comments box">
				<div class="comments-logo">
					<div class=message>...</div>
				</div>
				<div class="comments-text">
					<!--unused class -->
					<p class="com-viewNumbers">52 </p>
					<p class="com-viewText">Comments</p>
				</div>
			</div>
			<div class="views box">
				<div class="views-logo">
					<div class=eye> </div>
				</div>
				<div class="textInfo">
					<p class="com-viewNumbers">26.4k </p>
					<p class="com-viewText">Views</p>
				</div>
			</div>
			<div class="donuts box">
				<div class="boxss" id="piechart"></div>
			</div>
		</div>
		<!-- end right content -->
		<div class="clear-fixit"></div>
	</div>
	<!-- end content -->

	<script type='text/javascript' src='public/js/chart.js'></script>
</body>

</html>
