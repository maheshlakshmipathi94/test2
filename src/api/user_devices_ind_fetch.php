<?php
include 'db_details.php';

 date_default_timezone_set("Asia/Kolkata");
$dbc = mysqli_connect($host, $username, $password, $database);
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, $database);
if (!$dbs) {
    die("Database selection failed: " . mysqli_error($dbc));
    exit(); 
}

 $getjson = mysqli_query($dbc, "SELECT * FROM `user_device` ");
$values = mysqli_query($dbc, "SELECT * FROM `user_device` WHERE meter_id='".$_GET["meter_id"]."' ");
$yourArray = array(); // make a new array to hold all your data
$index = 0;
while($row = mysqli_fetch_assoc($values)){ // loop to store the data in an associative array.
     $yourArray[$index] = $row;
     $index++;
}


 echo '[{"dates":"'.$yourArray[0]['dates'].'","meter_id":"'.$yourArray[0]['meter_id'].'","user":"'.$yourArray[0]['user'].'","phone":"'.$yourArray[0]['phone'].'","location":"'.$yourArray[0]['location'].'"}]';
 ?>