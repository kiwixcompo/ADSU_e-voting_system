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
	<h1>Manage Candidates</h1>

	<div id="body">
	<?php if(! empty($message)) : ?>
		<div class="info-msg"><p><?php echo $message; ?></p></div>
	<?php endif; ?>
		
	<table border="1">
        <thead>
            <tr>
                <th>Candidate Name</th>
                <th>State Of Origin</th>
                <th>CGPA</th>
                <th>Category</th>
                <th>Passport</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
			<?php if(! empty($nomineeData) && is_array($nomineeData)) : ?>
				<?php foreach($nomineeData as $nominee) : ?>
					<tr>
			            <td>
			            	<?php echo strtoupper(strtolower($nominee['surname'])); ?>
			            	<?php echo strtoupper(strtolower($nominee['first_name'])); ?>
			            </td>
			            <td><?php echo strtoupper(strtolower($nominee['state_of_origin'])); ?></td>
			            <td><?php echo strtoupper(strtolower($nominee['CGPA'])); ?></td>
			            <td><?php echo expand_category($nominee['post_id']); ?></td>
			            <td><img src="<?php echo base_url() . 'uploads/images/' . $nominee['passport']; ?>" alt="Passport" style="width: 90px; height:90px;"></td>
			            <td><?php echo anchor('candidates/edit_nominee/' . $nominee['id'], 'Edit') ?> | 
							<a href="<?php echo base_url() . 'candidates/delete_nominee/' . $nominee['id'] ?>" onclick="return confirm('Click OK to confirm removal of this candidate');">Delete</a>	            	
			            	<?php /*echo anchor('candidates/delete_nominee/' . $nominee['id'], 'Delete', 'onclick="return confirm("Are you sure you want to delete this asset?");"')*/?></td>
		            </tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
		            <td colspan="6">No Candidate has been added yet</td>
	            </tr>
			<?php endif; ?>
        </tbody>
	</table>

	<?php echo form_open_multipart('candidates/new_nominees'); ?>
	<p>
		<label> Surname</label>
		<?php echo form_input('surname', set_value('surname')); ?>
	</p>
	<p>
		<label> First Name </label>
		<?php echo form_input('first_name', set_value('first_name')); ?>
    </p>
    <p>			
		<label> State Of Origin </label>
		<?php echo form_input('state_of_origin', set_value('state_of_origin')); ?>
    </p>
    <p>
		<label> CGPA </label>
		<?php echo form_input('CGPA', set_value('CGPA')); ?>
	</p>
	<?php echo form_label("Upload Candidate's passport below", 'passport'); ?>
			<p>
				<?php echo form_upload('passport'); ?>
			</p>
	<p>
		<label> Post </label>
		<?php echo category_dropdown('posts'); ?>
	</p>
	
	<p>
		<?php echo form_submit('submit_nominee', 'Add Candidate'); ?> | <?php echo anchor('users/main_page','Back'); ?>
	</p>
	<?php echo form_close(); ?>

	</div> 
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>