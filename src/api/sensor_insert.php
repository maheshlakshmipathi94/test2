<?php

include 'db_details.php';
date_default_timezone_set("Asia/Kolkata");
$link = mysqli_connect($host, $username, $password, $database);
//$link = mysqli_connect("localhost", "4fit", "motorinkz2016", "4fit_motorinkz");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$dates = date('Y-m-d H:i:s');
$date1 = date('Y-m-d');


// Attempt insert query execution//
$sql ="INSERT INTO `air_purifier_sensor` (dates,date,id,data1,data2,data3,data4) VALUES ('$dates','$date1','".$_GET["sensor_id"]."','0','0','0','0')";
mysqli_query($link, $sql);
$sql = "UPDATE air_purifier_devices SET sensor_id='".$_GET["sensor_id"]."' WHERE id='".$_GET["id"]."'";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>