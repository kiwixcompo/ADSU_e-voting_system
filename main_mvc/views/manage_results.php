<?php include 'template/header.php'; ?>

	<div class="content">
		
		<div class="header">
            <h1 class="page-title">Results by Category</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Results</li>
        </ul>
        <div class="container-fluid">
        	<div class="row-fluid">
        		<?php if(! empty($message)) : ?>
					<div class="info-msg"><p><?php echo $message; ?></p></div>
				<?php endif; ?>
				<table class="table">
				      <thead>
				        <tr>
					  		<th>Category</th>
					        <th style="width: 26px;">Actions</th>
				          	
				        </tr>
				      </thead>
				      <tbody>
				        	<?php if(! empty($resultData) && is_array($resultData)) : ?>
								<?php foreach($resultData as $result) : ?>
									<tr>
							            <td>
							            	<?php echo strtoupper(strtolower($result['post_name'])); ?>
							            </td>
							            <td><?php echo anchor('results/view_results/' . $result['id'], 'View Results for'.' '.$result['post_name'],'target="_blank", class="btn btn-danger"'); ?></td>
						            </tr>
								<?php endforeach; ?>
							<?php else : ?>
								<tr>
						            <td colspan="6">No category to display result</td>
					            </tr>
						<?php endif; ?>
				          </td>
				        </tr>
				        
				      </tbody>
			    </table>
        	</div>
        	
        </div>



	</div>

<?php include 'template/footer.php'; ?>