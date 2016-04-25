<?php

require '../database/info.php'; //getting access information
$dbname = "phptest"; //schema in your sql file

// Create connection
/*$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM ptest";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "" . $row["title"]. " " . $row["location"]. "\n";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
*/
//end using without prepared statements

$userinput = "Success!"; //pretend user input
$cleanedinput = htmlspecialchars($userinput);

try {
    $pdoconn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //connecting to the database PDO style. don't ask
    $pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdoconn->prepare("SELECT * FROM ptest WHERE title = :input"); //making a prepared statement
    $stmt->execute(array(':input' => $cleanedinput)); //executes the statement with the given input

	$row = $stmt->fetch(PDO::FETCH_ASSOC); //without fetch_assoc, it fetches the selection twice (although you don't see it in this first example)
	echo "" .$row['title']. "\n"; //since it was known there was only one result... 
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdoconn = null; //removing connection

try {
    $pdoconn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $pdoconn->prepare("INSERT INTO ptest (title, location)
        VALUES (:title, :location)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':location', $location);

    // insert a row
    $dirtytitle = "Hello"; //userinput, so clean it
	$title = htmlspecialchars($dirtytitle);
    $dirtylocation = "/here/";
	$location = htmlspecialchars($dirtylocation);
    $stmt->execute();

    echo "New records created successfully\n";
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdoconn = null;


try {
    $pdoconn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdoconn->prepare("SELECT * FROM ptest");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //print_r($result);
    //depends on how you wanna get your data
    foreach ($result as $row) {
        foreach($row as $col) {
            echo "$col\n";
        }
    }
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdoconn = null;

?>
