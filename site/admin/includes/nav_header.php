<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?php echo $site_title; ?></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				
				<li class="<?php echo $active_link_orders; ?>">
					<a href="index.php">Orders</a>
				</li>
				
				<li class="<?php echo $active_link_products; ?>">
					<a href="change_product_price.php">Change Product Price</a>
				</li>
				
				

			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="<?php echo $active_link_change_password; ?>">
					<a href="change_password.php">Change Password</a>
				</li>
				<li>
					<a href="logout.php">Logout</a>
				</li>

			</ul>
		</div>
		<!--/.nav-collapse -->
	</div>
</nav>