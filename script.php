<?php
$servername = "localhost";
$username = "root";
$password = "Abcd1234";
$dbname = "LTA";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	echo "<div style="display: none;"><script type='text/javascript'> var test = "$row["Date"]." </script></div>";
    }
} else {
    echo "<p style='display: none;'>0 results</p>";
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
	$("#lta").daysfromdate({ date: "10 May 2017" }, function() {
		$("#safedays").html("<span> Tidigare!! </span>");
		$("#text").hide();
	});
})
</script>