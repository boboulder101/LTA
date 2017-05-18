<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lta.js Demo</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css">
	<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-3.1.1.js"></script>
	

</head>
<body>
	<?php include("script.php");?>
	<div id="container">
		<div id="lta">
		<span>

		<form action="#" method="GET">
		<input type="hidden" name="act" value="run">
		<input type="submit" name="Submit" value="Accident" style="font-size: 50px; background-color: red;"></input>
		</form>
		</span>
		<span class="small">Safe days YTD</span>
		<span class="safedays"><?php echo floor($datediff / (60 * 60 * 24)); ?></span>
	<br />
		<span class="small">Number of Accidents YTD</span>
		<span class="days"><?php echo $NoA; ?></span>
	<br />	
		<span class="small">Lost Time Incidents YTD</span>
		<span class="days"><?php echo $LTI; ?></span>
		<span class="small">Days Since Last L.T.I.</span>
		<span class="days"><?php echo $DSL; ?></span>
			
		</div>
		<?php
		if (!empty($_GET['act'])){
			$insert = $NoA + 1;
			$sql = "INSERT INTO LTATabell(Safe-YTD) VALUES ('$insert')";
		} else {
			
		}
		?>
	

</body>
</html>