<?php include 'template/header.php'; ?>

<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Users</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Users</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
	<a href="<?php echo base_url(); ?>candidates/add_new_category" class="btn btn-primary"><i class="icon-plus"></i>New Category</a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
	<?php if(! empty($message)) : ?>
  <!-- <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button> -->
        
  <!-- </div> -->
		<div class="info-msg"><p><?php echo $message; ?></p></div>
	<?php endif; ?>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Category</th>
          <th style="width: 26px;">Actions</th>
        </tr>
      </thead>
      <tbody>
      	<?php if(! empty($categoryData) && is_array($categoryData)) : ?>
		<?php foreach($categoryData as $category) : ?>
        <tr>
            <td><?php echo $category['id']; ?></td>
			<td><?php echo strtoupper(strtolower($category['post_name'])); ?></td>
			<td>
				<a href="<?php echo base_url() . 'candidates/edit_category/' . $category['id'] ?>"><i class="icon-pencil"></i></a>
			            	<a href="<?php echo base_url() . 'candidates/delete_category/' . $category['id'] ?>" onclick="return confirm('Click OK to confirm removal of this category');"><i class="icon-remove"></i></a>
			</td>
        </tr>
        <?php endforeach; ?>
			<?php else : ?>
				<tr>
		            <td colspan="2">No Category has been added yet</td>
	            </tr>
			<?php endif; ?>
      </tbody>
    </table>
</div>
<!-- <div class="pagination">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div> -->

<?php include 'template/footer.php'; ?>