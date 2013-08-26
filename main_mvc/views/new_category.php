<?php include 'template/header.php'; ?>

	<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Manage Categories</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="#">Admin</a> <span class="divider">/</span></li>
            <li class="active">New Category</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
	    <?php echo form_open('candidates/manage_categories'); ?>
	        <label>Category Name</label>
	        	<input type="text" name="post_name" class="input-xlarge">
	    	<p>
	    	<input type="submit" name="submit_category" class="btn btn-primary" value="Create Category"> | <?php echo anchor('users/main_page','Back'); ?>
	    	</p>
    	<?php echo form_close(); ?>
    </div>
</div>
</div>


<?php include 'template/footer.php'; ?>