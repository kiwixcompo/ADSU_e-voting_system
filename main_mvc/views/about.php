<!Doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AeS | About</title>
	<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" media="screen">
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.js"></script>

	<style type="text/css">
		.span5{
			padding-right: 200px;
		}
		.span7{
			padding-left: 10px;
		}
		.span12{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<header class="row" text-align="center">
			<div class="span12">
				<nav class="navbar navbar-inverse">
					
						<div class="navbar-inner">
							<a href="#" class="brand">ADSU e-Voting System</a>
							<ul class="nav">
								<li class="divider-vertical"></li>
								<li>
									<?php echo anchor('users/index', 'Home'); ?>
								</li>
								<li class="divider-vertical"></li>
								<li class="active">
									<?php echo anchor('users/about', 'About'); ?>
								</li>
								<li class="divider-vertical"></li>
								<li><?php echo anchor('users/view_login', 'Admin Panel'); ?></li>
								<li class="divider-vertical"></li>
								<li>
									<?php echo anchor('users/user_manual', 'User Manual'); ?>
								</li>
								<li class="divider-vertical"></li>
							</ul>
						</div>
				</nav>
				
			</div>
		</header> <!-- End of header -->

		<div class="row" id="main-content">
			<div class="span12">
				<body text-align="center">
					<div class="well">
						<p> 
							The ADSU e-Voting System was designed to help eliminate the amount of mischievous activities done during elections, by reducing human efforts and automating virtually all the key areas of the electoral process.
						</p>
						<p>
							<small> <strong>Version: </strong> 1.00 </small>
						</p>
					</div>
				</body>
				
			</div>
		</div>
		<footer class="row">
			<div class="span12">
				<hr>
					<p class="footer pull-right"><em>Built by: </em><small><strong>Williams Alfred Onen </strong></p></small>

					<!-- <h6>&copy ADSU e-Voting System, 2013</h6> -->
			</div> <!-- End of footer -->
		</footer>

		
	</div>


	
</body>
</html>