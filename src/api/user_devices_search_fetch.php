<?php

include 'db_details.php';


 
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




   
    $getjson = mysqli_query($dbc, "SELECT dates,email,id,lat,longi,installation,service FROM `devices_users` WHERE email='".$_GET["email"]."' ORDER BY dates DESC ");

$rows = array();
while($r = mysqli_fetch_assoc($getjson)) {
    $rows[] = $r;
}
print json_encode($rows);
  	

          
?>