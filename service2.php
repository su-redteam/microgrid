<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "benjanr0_microgrid";
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$link){
	die('Connect Error(' . mysqli_connect_errno() . ') '
			. mysqli_connect_error());
}else{
echo "connected to server; ";
}

// define sql statement
$sql = "SELECT * FROM ModelData";

if ($result = mysqli_query($link, $sql)) {
	// prints number of rows in $link"
	    printf("Select returned %d rows.\n", mysqli_num_rows($result));
		
	// If so, then create a results array and a temporary one
	// to hold the data
	$resultArray = array();
	$tempArray = array();
 
	// Loop through each row in the result set
	while($row = $result->fetch_object())
	{
		// Add each row into our results array
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
 
	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray, JSON_PRETTY_PRINT);

    $result->close();
}

if ( false===$result ){
	printf("error: %s\n", mysqli_error($link));
}else{
	echo "  done. ";
}
	mysql_close($link);
	
?>