<?php include 'template/header.php'; ?>
 
    <div class="content">
        
        <div class="header">
            <h1 class="page-title">Dashboard</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">View Generated PINS</li>
        </ul>

        <div class="container-fluid">
		    <div class="block">
		        <p class="block-heading">Generated PIN(S)</p>
		        <div id="print_pin">
		            	<ul class="cf">
			            	<?php if(! empty($pins) && is_array($pins)) : ?>
							<?php foreach($pins as $pin) : ?>
			            		<li class="img-polaroid" style="width: 140px; height:140px;">
			            			<p>
										<?php echo $association_name .' '. date('Y'); ?>
									</p>
									<p> 
										<?php echo $pin->pin; ?>
									</p>
									<em>Note: Valid for ONLY one (1) voter.</em>
								</li>
			            	<?php endforeach; ?>
			            	<?php else : ?>
								<p><strong>No PIN available to view</strong></p>
							<?php endif; ?>    
		            	</ul>
		            <div class="clearfix"></div>
		        </div>
		    </div>			
		</div>
<?php include 'template/footer.php'; ?>