<?php

require_once("config.php");
$result = $conn->query("select * from events");

$dbdata = array();

//Fetch into associative array
while ( $row = $result->fetch_assoc())  {
    $dbdata[]=$row;
}

//Print array in JSON format
echo json_encode($dbdata);

?>