<?php include 'template/voting_section_header.php'; ?>

	<div class="row" id="main-content">
		<div class="span12">
			<body text-align="center">
				<h1 style="color: #FFFFFF">Voting Category - <?php echo $category; ?></h1>
					<?php echo form_open('users/vote_nominee'); ?>
				
					<?php if(! empty($message1)) : ?>
						<div class="alert alert-error">
	        				<button type="button" class="close" data-dismiss="alert"></button>
	         					<?php echo $message1; ?>
	    				</div>
    				<?php endif; ?>
					
					<?php if (! empty($message2)) : ?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert"></button>
							<?php echo $message2; ?>
						</div>	
					<?php endif; ?>

					<p>
						<label for="matric_no" style="color: #FFFFFF">PIN Number:</label>
						<?php echo form_input('pin_no', set_value('pin_no'),'class="input-xlarge"'); ?>
					</p>
		<div id="result_stats">
			<h3 style="color: #ff0000">Select your candidate below:</h3>

		<table>
			<thead>
				<tr>
					<th>Candidate Name</th>
					<th>Passport</th>
					<th>Vote</th>
				</tr>
			</thead>
			
		<?php if(! empty($votingCategory) && is_array($votingCategory)) : ?>
			<?php foreach($votingCategory as $vote) : ?>
			<tr>
					<td>
						<?php echo $vote->surname; ?> <?php echo $vote->first_name; ?> 
					</td>
					<td>
						<img src="<?php echo base_url() . 'uploads/images/' . $vote->passport; ?>" alt="Passport" style="width: 90px; height:90px;">
					</td>
					<td>
						<?php echo form_radio('candidate', $vote->id); ?>
					</td>
				</tr>

			<?php endforeach; ?>
		<?php endif; ?>
		<tbody>
				
			</tbody>
		</table>
	</div>
		<?php echo form_hidden('category_id',$cat_id); ?>
		<p>
			<?php echo form_submit('vote','Vote', 'class="btn btn-success"'); ?> | <?php echo anchor('users/voting_area', 'Back', 'class="btn btn-danger"'); ?>
		</p>

		<?php echo form_close(); ?>

			</body>	
		</div>
	</div>

<?php include 'template/voting_section_footer.php'; ?>