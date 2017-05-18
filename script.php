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

$now = time(); // or your date as well
$your_date = strtotime($date);
$datediff = $now - $your_date;
?>