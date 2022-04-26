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




   
   $query1 = mysqli_query($dbc,"SELECT * FROM app_users");
 $query2 = mysqli_query($dbc,"SELECT * FROM devices_users");
 $query3 = mysqli_query($dbc,"SELECT * FROM complaints");
 $query4 = mysqli_query($dbc,"SELECT * FROM dealers");


$appnumber=mysqli_num_rows($query1);
$devicenumber=mysqli_num_rows($query2);
$complaintnumber=mysqli_num_rows($query3);
$dealersnumber=mysqli_num_rows($query4);

 echo '[{"app":"'.$appnumber.'","device":"'.$devicenumber.'","complaint":"'.$complaintnumber.'","dealers":"'.$dealersnumber.'"}]';

  	

          
?>