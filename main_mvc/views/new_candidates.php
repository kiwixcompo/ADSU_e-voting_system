<?php include 'template/header.php'; ?>
		<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Manage Candidates</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="#">Admin</a> <span class="divider">/</span></li>
            <li class="active">New Candidate</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
	    <?php echo form_open_multipart('candidates/new_nominees'); ?>
	        <label>Surname</label>
	        	<input type="text" name="surname" class="input-xlarge">
	        <label>First Name</label>
	        	<input type="text" name="first_name" class="input-xlarge">
	        <label>State Of Origin</label>
	        	<input type="text" name="state_of_origin" class="input-xlarge">
	        <label>CGPA</label>
	        	<input type="text" name="CGPA" class="input-xlarge">
	        <label>Upload Passport</label>
	        	<?php echo form_upload('passport', 'class="input-xlarge"'); ?>
	        <label>Category</label>
	        <?php echo category_dropdown('posts', 'class="input-xlarge"'); ?>
	    	<p>
	    	<input type="submit" name="submit_nominee" class="btn btn-primary" value="Add Candidate">
	    	</p>
    	<?php echo form_close(); ?>
    </div>
</div>
</div>

<?php include 'template/footer.php'; ?>