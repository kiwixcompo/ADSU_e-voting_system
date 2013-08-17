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
	<h1>Voting Category - <?php echo $category; ?></h1>

	<div id="body">
	<?php echo form_open('users/vote_nominee'); ?>
			
		<?php if(! empty($message)) : ?>
			<div class="info-msg"><p><?php echo $message; ?></p></div>
		<?php endif; ?>

		<p>
			<label for="matric_no">PIN Number:</label>
			<?php echo form_input('pin_no', set_value('pin_no'),'id="pin_no"'); ?>
		</p>
		
		Select your candidate below:
		<table border="1" text-align="center" align="center">
			<thead>
				<tr>
					<th>Candidate Name</th>
					<th>Passport</th>
					<th>Vote</th>
				</tr>
			</thead>
			
		<?php if(! empty($votingCategory) && is_array($votingCategory)) : ?>
			<?php foreach($votingCategory as $vote) : ?>
			<tr>
					<td>
						<?php echo $vote->surname; ?> <?php echo $vote->first_name; ?> 
					</td>
					<td>
						<img src="<?php echo base_url() . 'uploads/images/' . $vote->passport; ?>" alt="Passport" style="width: 90px; height:90px;">
					</td>
					<td>
						<?php echo form_radio('candidate', $vote->id); ?>
					</td>
				</tr>

			<?php endforeach; ?>
		<?php endif; ?>
		<tbody>
				
			</tbody>
		</table>
		<?php echo form_hidden('category_id',$cat_id); ?>
		<p>
			<?php echo form_submit('vote','Vote'); ?> | <?php echo anchor('users/voting_area', 'Back'); ?>
		</p>

		<?php echo form_close(); ?>
		
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>