<?php include 'template/header.php'; ?>
		<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Manage Candidates</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="#">Admin</a> <span class="divider">/</span></li>
            <li class="active">Update Candidate</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
	    <?php echo form_open_multipart('candidates/edit_nominee'); ?>
	    <?php if(! empty($nomineeData) && is_array($nomineeData)) : ?>
		<?php foreach($nomineeData as $nominee) : ?>
	        <label>Surname</label>
	        	<?php 
	        		$attributes = [
	        						'name' => 'surname',
	        						'class' => 'input-xlarge',
	        						'value' => $nominee['surname']
	        					  ];
	        	 ?>
	        	 <?php echo form_input($attributes); ?>
	        	<!-- <input type="text" name="surname" class="input-xlarge" value="$nominee['surname']"> -->
	        <label>First Name</label>
	        	<?php 
	        		$attributes = [
	        						'name' => 'first_name',
	        						'class' => 'input-xlarge',
	        						'value' => $nominee['first_name']
	        					  ];
	        	 ?>
	        	 <?php echo form_input($attributes); ?>
	        	<!-- <input type="text" name="first_name" class="input-xlarge" value=$nominee['first_name']> -->
	        <label>State Of Origin</label>
	        	<?php 
	        		$attributes = [
	        						'name' => 'state_of_origin',
	        						'class' => 'input-xlarge',
	        						'value' => $nominee['state_of_origin']
	        					  ];
	        	 ?>
	        	 <?php echo form_input($attributes); ?>
	        	<!-- <input type="text" name="state_of_origin" class="input-xlarge" value="$nominee['state_of_origin']"> -->
	        <label>CGPA</label>
	        	<?php 
	        		$attributes = [
	        						'name' => 'CGPA',
	        						'class' => 'input-xlarge',
	        						'value' => $nominee['CGPA']
	        					  ];
	        	 ?>
	        	 <?php echo form_input($attributes); ?>
	        	<!-- <input type="text" name="CGPA" class="input-xlarge" value="$nominee['CGPA']"> -->
	        <label>Upload Passport</label>
	        	<?php echo form_upload('passport', 'class="input-xlarge"'); ?>
	        <label>Category</label>
	        <?php echo category_dropdown('posts', 'class="input-xlarge"'); ?>
	        <?php echo form_hidden('id', set_value('id',$nominee['id'])); ?>
	    	<p>
	    	<input type="submit" name="submit_nominee" class="btn btn-primary" value="Update Candidate"> | <?php echo anchor('candidates/manage_candidates','Cancel'); ?>
	    	</p>
	    <?php endforeach; ?>
		<?php endif; ?>
    	<?php echo form_close(); ?>
    </div>
</div>
</div>

<?php include 'template/footer.php'; ?>