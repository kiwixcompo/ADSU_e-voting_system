<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AeS Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheets/theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/font-awesome/css/font-awesome.css">

    <script src="<?php echo base_url(); ?>lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">ADSU</span> <span class="second">e-Voting System</span></a>
        </div>
    </div>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Login Panel</p>
            <div class="block-body">
                <?php echo form_open(base_url() . 'users/login'); ?>
                    <label>Username</label>
                    <?php 
						$reg_attributes = ['name' => 'matric_no',
										'id' => 'matric_no',
										'required' => 'required',
										'placeholder' => 'Enter Username',
										'class' => 'span12'];

					 ?>
					 <?php echo form_input($reg_attributes); ?>
                    <label>Password</label>
                    <?php 
							$password_attributes = ['name' => 'password',
											'id' => 'password',
											'required' => 'required',
											'placeholder' => 'Enter Password',
											'class' => 'span12'];

					?>
					<?php echo form_password($password_attributes); ?>
                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Login">
                    <label class="remember-me"><input type="checkbox"> Remember me</label>
                    <div class="clearfix"></div>
                    <?php 
                        if (!empty($notification)){
                            echo $notification;
                        }
                     ?>
                    <?php
					if($this->session->flashdata('login_failure', FALSE)){
						echo "Incorrect username or password";
					}
						 echo validation_errors();
					 ?>
                <?php echo form_close(); ?>
            </div>
        </div>
        <p class="pull-right" style=""><a href="http://www.kiwixcompo.com" target="blank">by Williams Alfred Onen</a></p>
        <p><?php echo anchor('users/index', 'Back to home'); ?></p>
    </div>
</div>


    


    <script src="<?php echo base_url(); ?>lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


