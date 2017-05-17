<?php
$servername = "localhost";
$username = "root";
$password = "Abcd1234";
$dbname = "LTA";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

$sql = "SELECT * FROM LTATabell";
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc())  {
    	$safe = $row['Safe-YTD'];
    	$NoA = $row['NoA-YTD'];
    	$LTI = $row['LTI-YTD'];
    	$DSL = $row['DSL-LTI'];
    	$date = $row['Datum'];
    	
    }
} else {
    echo "<p>0 results</p>";
}

mysqli_close($conn);
?>






<script type="text/javascript">
	//LTA plugin
// calculate days from date
(function($) {
	$.fn.daysfromdate = function(options, callback) {
		var settings = {"date" : null};

		if (options) {
			$.extend(settings, options);
		}

		self = $(this);

		function safedays_execute() {
			var eventDate = Date.parse(settings.date) / 60000;
			var currentDate = Math.floor($.now() / 60000);

			if (eventDate >= currentDate) {
				callback.call(this);
				clearInterval(interval);
			}

			minutes = currentDate - eventDate;

			days = Math.floor(minutes / (60 * 24));
			days = (String(days).length < 2) ? "0000" + days : days;


			if (!isNaN(eventDate)) {
				self.find(".safedays").text(days);
			}
			"interval = setInterval(lta_execute, 60000);"
		}

		safedays_execute();
	}
})(jQuery);

//script
$(document).ready(function() {
	$("#lta").daysfromdate({ date: <?php echo $date;?> }, function() {
		$("#safedays").html("<span> Tidigare!! </span>");
		$("#text").hide();
	});
})
</script>