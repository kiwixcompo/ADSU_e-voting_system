<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Codeigniter</title>
	<link type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>	
	<script type="text/javascript">
		// Do some Database Stuff
		var chart_obj; // globally available
		var base_url = "<?php echo base_url(); ?>"; // globally available
		$(document).ready(function() {
			Highcharts.setOptions({
				chart: {
					backgroundColor: {
						linearGradient: [0,0,500,500],
						stops: [[0,"rgb(255, 255, 255)"],[1,"rgb(240, 240, 255)"]]},
						shadow: true}
			});
		  	
			var chart_1 = new Highcharts.Chart({
				chart: {
					renderTo: "chart_container",
					type:"pie"
					},
				title: {
	           		text: <?php echo "'" . "Election result for category - <strong>" . $resultCategoryData . "</strong>'"; ?>
	         		},
				tooltip: {
					formatter:	function() { 
						return '<b>'+ this.point.name +'</b>: '+ this.y +' %'
						}
					},
				plotOptions: {
					pie: {
						dataLabels:	{
						formatter:function() { 
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}}
						}
				},
				credits: {
					href: "http://www.kiwixcompo.com",
					text: "<em>Courtesy:</em> Williams Alfred Onen"
				},
				series:[<?php echo $resultData; ?>]
			});
			  
		 });
	</script>	
</head>
<body>

<div id="container">
	<h1>Result Chart</h1>
	<div id="body">
	
		<div id="chart_container"></div>
		
		<div id="result_stats">
			<h3>Result Statistics</h3>
			<table>
				<thead>
					<tr>
						<th>Candidate Name</th>
						<th>Passport</th>
						<th>Total Votes</th>
					</tr>
				</thead>
				<tbody>
					<?php if(! empty($resultStat) && is_array($resultStat)) : ?>
					<?php foreach($resultStat as $result) : ?>
						<tr>
							<td><?php echo ucwords(strtolower($result['nominee_name'])); ?></td>
							<td>
								<img src="<?php echo base_url() . 'uploads/images/' . $result['passport']; ?>" alt="Passport" style="width: 90px; height:90px;">
							</td>
							<td><?php echo $result['total_votes']; ?></td>
						</tr>
					<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="2">No result available for this category</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
			
		</div>
		
		
	</div>
	<br />
</div>


</body>
</html>