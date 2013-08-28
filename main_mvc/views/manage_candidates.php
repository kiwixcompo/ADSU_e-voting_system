<?php include 'template/header.php'; ?>
	<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Manage Candidates</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="#">Admin</a> <span class="divider">/</span></li>
            <li class="active">Candidates</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
  <div class="btn-toolbar">
	<a class="btn btn-primary" href="<?php echo base_url(); ?>candidates/add_new"><i class="icon-plus"></i>New Candidate</a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
	<?php if(! empty($message)) : ?>
  <!-- <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        
  </div> -->
		<div class="info-msg"><p><?php echo $message; ?></p></div>
	<?php endif; ?>
    <table class="table">
      <thead>
        <tr>
	  		<th>Candidate Name</th>
	        <th>State Of Origin</th>
	        <th>CGPA</th>
	        <th>Category</th>
	        <th>Passport</th>
	        <th style="width: 26px;">Actions</th>
          	
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
			            <td>
			            <a href="<?php echo base_url() . 'candidates/edit_nominee/' . $nominee['id'] ?>"><i class="icon-pencil"></i></a>
              			<a href="<?php echo base_url() . 'candidates/delete_nominee/' . $nominee['id'] ?>" onclick="return confirm('Click OK to confirm removal of this candidate');"><i class="icon-remove"></i></a>
              			</td>
		            </tr>
				<?php endforeach; ?>
		<?php else : ?>
				<tr>
		            <td colspan="6">No Candidate has been added yet</td>
	            </tr>
		<?php endif; ?>
          </td>
        </tr>
        
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

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>
<?php include 'template/footer.php'; ?>