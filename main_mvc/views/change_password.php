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

    <script type="text/javascript">
            
            function checkForm(){
                var Pass = document.getElementByID('Pass').value;
                if (Pass.length < 5) {
                    alert('Invalid Password');
                    return false;
                }else{
                    return true;
                }
            }

            function checkPass(){
                var Pass = document.getElementById('Pass').value;
                var element = document.getElementById('labelPass').value;
                if (Pass.length < 5) {
                    element.innerHTML = "Invalid Password";
                    element.style.color = "red";
                }else  {
                    element.innerHTML = "Valid Password";
                    element.style.color = "green";
                }
            }
        </script>
    
    <?php $attr = ['id' => 'checkForm',
                    'onsubmit' => 'return checkForm();']; ?>
    <?php echo form_open('users/change_p', $attr); ?>
    	
        <label>Old Password</label>
        <?php $attr = [	'name' => 'old_password',
                		/*'required' => 'required',*/
                		'class' => 'input-xlarge'] ?>
        <?php echo form_password($attr); ?>
        <label>New Password</label>
        <?php $attr = [	'name' => 'new_password',
                				/*'required' => 'required',*/
                				'class' => 'input-xlarge'] ?>
        <?php echo form_password($attr); ?>
        <label>Comfirm New Password</label>
        <?php $attr = [	'name' => 'confirm_new_password',
                				/*'required' => 'required',*/
                				'class' => 'input-xlarge',
                                'id' => 'Pass',
                                'onblur' => 'checkPass()']; ?>
        <?php echo form_password($attr); ?>
        <label id="labelPass"></label>
       
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