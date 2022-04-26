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
$date1 = date('Y-m-d');


// Attempt insert query execution
$sql ="INSERT INTO `hubs_list` (email,dates,hub_id,lat,longi,location) VALUES ('".$_GET["email"]."', '$date','".$_GET["hub_id"]."','".$_GET["lat"]."','".$_GET["longi"]."','".$_GET["location"]."')";

if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql ="INSERT INTO `device_data` (dates,date,id) VALUES ('$date','$date1','".$_GET["id"]."')";
 if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>