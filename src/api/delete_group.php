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
//$sql ="INSERT INTO `device_users` (id, dates,email) VALUES ('".$_GET["id"]."', '$date','".$_GET["email"]."')";
$sql = "UPDATE device_list SET groups='0' WHERE groups='".$_GET["groups"]."' ORDER BY dates DESC";
if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>