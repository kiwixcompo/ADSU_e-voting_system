<?php include 'template/voting_section_header.php'; ?>
	<div class="row" id="main-content">
		<div class="span12">
			<body text-align="center">
				<?php echo form_open('users/voting_category'); ?>
			
					<?php if(! empty($message)) : ?>
						<p><?php echo $message; ?></p>
					<?php endif; ?>

						<p>
							<label for="posts" style="color: #FFFFFF">Select a category:</label>
							<?php echo category_dropdown('posts', set_value('posts'), 'class="input-xlarge"'); ?>
						</p>

						<p>
							<?php echo form_submit('submit','Proceed', 'class="btn btn-primary"'); ?> | <?php echo anchor('users/index', 'Back to home', 'class="btn btn-danger"'); ?>

						</p>

				<?php echo form_close(); ?>
			</body>
				
		</div>
	</div>


<?php include 'template/voting_section_footer.php'; ?>