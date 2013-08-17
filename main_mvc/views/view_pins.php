<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		text-align: center;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

	label {
		display: block;
	}
	
	table {
		width: 700px;
		text-align: center;
	}

		table th {
			background: #efefef;
		}
		
		table td {
			background: #fefef3;
		}

	li {
		list-style: none;
	}
	.cf:after {
	visibility: hidden;
	display: block;
	content: "";
	clear: both;
	height: 0;
}	

div#print_pin {
		width: 850px;
		margin: 0 auto;
	}
		div#print_pin ul {
			
		}
			div#print_pin ul li {
				float: left;
				width:200px;
				margin-right: 5px;
				margin-bottom: 5px;
				padding: 20px;
				list-style: none;
				border: 1px solid #444;
				text-align: center;
				
			}
				div#print_pin ul li p {
					font-size: 24px;
					font-weight: bold;
					margin: 5px 0;
				}
				div#print_pin ul li em {
					font-size: 10px;
				}


	</style>
</head>
<body>

<div id="container">
	<h1>Print PIN(s)</h1>

	<div id="body">

	<div id="print_pin">
		<ul class="cf">
		<table>
			<thead>
			</thead>
			<tbody>
				
					<?php if(! empty($pins) && is_array($pins)) : ?>
						<?php foreach($pins as $pin) : ?>
							<td style="width: 100px; height:100px;">
								<li><p>
									<?php echo $association_name .' ' . date('Y'); ?></p>
									<p><?php echo $pin->pin; ?></p>
									<em>Note: Valid for ONLY one (1) voter.</em>
								</li>
							</td>
						<?php endforeach; ?>
				
			</tbody>
			</table>
				<?php else : ?>
					<p><strong>No PIN available to view</strong></p>
				<?php endif; ?>
		</ul>
	</div>
	
	<p><?php echo anchor('pins/manage_pin', 'Back'); ?></p>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>



















