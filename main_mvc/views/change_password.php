<?php include 'template/header.php'; ?>
	<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Change Password</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="#">AeS</a> <span class="divider">/</span></li>
            <li><a href="#">Admin</a> <span class="divider">/</span></li>
            <li class="active">Change Password</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">

<div class="well">
    <?php echo form_open('users/change_p'); ?>
    	
        <label>Old Password</label>
        <?php $attr = [	'name' => 'old_password',
                		'required' => 'required',
                		'class' => 'input-xlarge'] ?>
        <?php echo form_password($attr); ?>
        <label>New Password</label>
        <?php $attr = [	'name' => 'new_password',
                				'required' => 'required',
                				'class' => 'input-xlarge'] ?>
        <?php echo form_password($attr); ?>
        <label>Comfirm New Password</label>
        <?php $attr = [	'name' => 'confirm_new_password',
                				'required' => 'required',
                				'class' => 'input-xlarge'] ?>
        <?php echo form_password($attr); ?>
        <?php echo form_hidden('id', $this->session->userdata('user_id')); ?>
        <div>
        	<input type="submit" name="change" class="btn btn-primary" value="Change Password">
        </div>
        <?php $password_error = $this->session->flashdata('password_error'); ?>
        <?php if (!empty($password_error)) {
        	echo $password_error;
        } ?>
    <?php echo form_close(); ?>
  </div>

</div>

<?php include 'template/footer.php'; ?>