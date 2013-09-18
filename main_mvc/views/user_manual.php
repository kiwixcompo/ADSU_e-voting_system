<!Doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AeS | User Manual</title>
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
		.container li{
			list-style: none;
		}
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
								<li>
									<?php echo anchor('users/about', 'About'); ?>
								</li>
								<li class="divider-vertical"></li>
								<li><?php echo anchor('users/view_login', 'Admin Panel'); ?></li>
								<li class="divider-vertical"></li>
								<li class="active">
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
							<ul id="manual">
								<h2>Five (5) easy steps to vote</h2>
							<strong>STEP 1: </strong>
								<li>Retrieve your pin from the administrator</li>
							<strong>STEP 2: </strong>
								<li>Click on "Start the voting session"</li>
							<strong>STEP 3: </strong>
								<li>Select the category you will like to vote in, then click "proceed"</li>
							<strong>STEP 4: </strong>
								<li>Type in your pin into the input field labeled "PIN Number", then select your candidate from the list of available candidates by ticking the checkbox beside the respective candidate</li>
							<strong>STEP 5: </strong>
								<li>Click "back" and repeat <strong>STEP 3</strong> to <strong>STEP 5</strong> to vote in the rest of the categories</li>
							</ul>
						</p>
						<p>
							<small class="pull-right"> <strong>Version: </strong> 1.00 </small>
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