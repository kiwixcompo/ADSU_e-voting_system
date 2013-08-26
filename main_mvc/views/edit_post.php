<?php include 'template/header.php'; ?>

	<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Manage Categories</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="#">Admin</a> <span class="divider">/</span></li>
            <li class="active">Modify Category</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
        <?php if(! empty($message)) : ?>
			<div class="info-msg"><p><?php echo $message; ?></p></div>
		<?php endif; ?>
	    <?php echo form_open('candidates/edit_category'); ?>
	    <?php if(! empty($categoryData) && is_array($categoryData)) : ?>
		<?php foreach($categoryData as $category) : ?>
	        <label>Category Name</label>
	        	<?php 
	        		$attributes = [
	        						'name' => 'post_name',
	        						'class' => 'input-xlarge',
	        						'value' => $category['post_name']
	        						] 
	        	?>
	        	<?php echo form_input($attributes); ?>
	        	<?php echo form_hidden('id', set_value('id',$category['id'])); ?>
	    	<p>
	    	<input type="submit" name="submit_category" class="btn btn-primary" value="Update Category"> | <?php echo anchor('candidates/manage_categories','Cancel'); ?>
	    	</p>
	    <?php endforeach; ?>
		<?php endif; ?>
    	<?php echo form_close(); ?>
    </div>
</div>
</div>


<?php include 'template/footer.php'; ?>