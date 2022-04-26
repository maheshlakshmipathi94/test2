<?php

include 'db_details.php';
date_default_timezone_set("Asia/Kolkata");
$link = mysqli_connect($host, $username, $password, $database);
//$link = mysqli_connect("localhost", "4fit", "motorinkz2016", "4fit_motorinkz");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$date = date('Y-m-d H:i:s');


// Attempt insert query execution
$sql ="INSERT INTO `devices` (id, dates,email) VALUES ('".$_GET["id"]."', '$date','".$_GET["email"]."')";
//$sql = "UPDATE current SET speed='".$_GET["speed"]."',lat='".$_GET["lat"]."',longi='".$_GET["longi"]."', date='$date', avgspeed='".$_GET["avgspeed"]."', RPM='".$_GET["RPM"]."', distance='".$_GET["distance"]."', olat='".$_GET["olat"]."', olongi='".$_GET["olongi"]."' WHERE id='".$_GET["id"]."'";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>