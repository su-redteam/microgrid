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
}

echo "connected to server; ";

$test = mysqli_select_db($link, $dbname);

if (!$test)
{
	echo "could not connect to database; ";
}else{
	echo "connected to database; ";
}
// select all from table Model Data
$sql = "SELECT * FROM 'ModelData'";

//echo "query complete; ";


//$numrows = mysqli_num_rows($result);
// how many rows in table?
//echo "$dbname has  $numrows rows";
if ($result = mysqli_query($link, "SELECT * FROM ModelData")) {
	    printf("Select returned %d rows.\n", mysqli_num_rows($result));

    /* free result set */
    mysqli_free_result($result);
	echo "inside if; ";
    var_dump($result);
    $result->close();
}
if ( false===$result ){
	printf("error: %s\n", mysqli_error($link));
}else{
	echo "done. ";
}
// check for results
var_dump($result);

/*if ($result)
{
	echo "inside if statement; ";
	  Note, that we can't execute any functions which interact with the
       server until result set was closed. All calls will return an
       'out of sync' error 
    if (!$mysqli->query("SET @a:='this will not work'")) {
        printf("Error: %s\n", $mysqli->error);
    }
    $result->close();
}*/
	// close connection
	mysql_close($link);
	
?>