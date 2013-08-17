<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		text-align: center;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	li {
		list-style: none;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Manage Users</h1>

	<div id="body">
	<?php if(! empty($message)) : ?>
		<div class="info-msg"><p><?php echo $message; ?></p></div>
	<?php endif; ?>
	
	<?php echo form_open('users/new_users'); ?>
	<p>
		<label> Matric Number</label>
		<?php echo form_input('matric_no', set_value('matric_no')); ?>
	</p>
	<p>
		<label> Password </label>
		<?php echo form_input('password', set_value('password')); ?>
    </p>
    
	<p>
		<label> User Type </label>
		<?php echo user_type_dropdown('user_type'); ?>
	</p>
	
	<p>
		<?php echo form_submit('submit_user', 'Add User'); ?> | <?php echo anchor('users/main_page','Back'); ?>
	</p>
	<?php echo form_close(); ?>

		<?php echo form_open_multipart('users/import_xls'); ?>
			<p>
				<?php echo form_label('Import a .xlsx list of users', 'import_xls'); ?>
			</p>
				<?php echo form_upload('import_xls'); ?>
				<?php echo form_submit('import', 'Import'); ?>
			</p>
		<?php echo form_close(); ?>

	<?php echo anchor('users/view_users', 'View all users'); ?>

	</div> 
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>